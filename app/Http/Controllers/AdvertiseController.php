<?php

namespace App\Http\Controllers;

use App\Services\AdvertisementFilter;
use App\Services\AdvertisementSort;
use App\Models\Advertisement;
use App\Models\Images;
use App\Services\Geocoding;

use Illuminate\Http\Request;

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
        $images=Images::getImage();
        $advertisements = new Advertisement();
        $filter = new AdvertisementFilter($request,$advertisements);
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
        $geocoding = new Geocoding();
        $advertisement = Advertisement::getAdvertiseById($id);
        $images = Images::getImagesById($id);
        $coordinates = $geocoding->getCoordinate($advertisement->Address,$advertisement->City);
        var_dump($coordinates);
        return view('advertise', compact('advertisement', 'images'));
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
        return redirect()->route("admin.action");
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
