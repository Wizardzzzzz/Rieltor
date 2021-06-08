<?php

namespace App\Http\Controllers;

use App\Services\AdvertisementFilter;
use App\Services\AdvertisementSort;
use App\Models\Advertisement;
use App\Models\Images;
use App\Services\Geocoding;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Tests\Integration\Queue\Order;

class AdvertiseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('admin')->only(['create','edit','update','delete']);
    }

    public function index(Request $request)
    {

        if($request['Sort']!=null){
        $sort = new AdvertisementSort($request);
        $sort = $sort->sort();

        if($request['Sort']=='MCheaper'||$request['Sort']=='MExpensive'){
            $advertisement = Advertisement::select(DB::raw('*,Price/Area as MPrice'))->orderBy('MPrice',$sort['param']);

        }else{
            $advertisement = Advertisement::orderBy($sort['name'],$sort['param']);
        }}else{
            $advertisement = new Advertisement();
        }


        $images=Images::getImage();
        $filter = new AdvertisementFilter($request,$advertisement);
        $advertisement =  $filter->filter()->where('IsArchieved','=','0')->paginate(18);
        return view('sale',['data'=>$advertisement],['images'=>$images]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('advertisement');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    private function validation(Request $req)
    {
        $validation = $req->validate([
                'Name' => 'required|min:3|max:90',
                'Place' => 'required|min:3|max:150',
                'Address' => 'required|min:5|max:90',
                'Fettle' => 'required|min:3|max:150',
                'Benefits' => 'required|min:3|max:150',
                'Infrastructure' => 'required|min:3|max:200',
                'About' => 'required|min:3|max:500'
            ]
        );

    }

    public function store(Request $request)
    {
        $table = \DB::select("show table status like '" . "advertisements" . "'"); //show previous id
        $id = $table[0]->Auto_increment;
        $this->validation($request);
        Advertisement::setAdvertise($request);
        Images::setImage($id);
        return redirect()->route("advertisements.index");
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $advertisement = Advertisement::getAdvertiseById($id);
        $images = Images::getImagesById($id);
        $coordinates = (new Geocoding())->getCoordinate($advertisement[0]->Address,$advertisement[0]->City);
       $coordinates = $coordinates['data'][0];


        return view('advertise', compact('advertisement', 'images','coordinates'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    $advertisement = (new Advertisement())->where('id','=',$id)->get();
    return view('admin.edit',compact('advertisement'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {

       Advertisement::where('id',$id)->update($request->except(['_token','_method']));
        return redirect()->route("advertisements.action");
    }

    //    public function archieve($id){
//
//    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */

    public function destroy($id)
    {
        $images = (new Images())->where('adv_id',$id);
        $images->delete();
        $advertisement = (new Advertisement())->find($id);
        $advertisement->delete();

        return redirect()->route("advertisements.archieve");
    }
}
