<?php

namespace App\Http\Controllers;

use App\Classes\AdvertisementFilter;
use App\Classes\AdvertisementSort;
use App\Models\Advertisement;
use App\Models\Images;


use Illuminate\Http\Request;

class AdvertiseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index(Request $request)
    {
        $images=Images::getImage();
        $filter = new AdvertisementFilter($request);
        $advertisements =  $filter->filter()->get();
//        $advertisements = new AdvertisementSort($request,$advertisements);

        return view('sale',['data'=>$advertisements],['images'=>$images]);
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
//        var_dump($request->input("RoomNum"));
        Advertisement::setAdvertise($request);
        Images::setImage($id);
        return redirect()->route("advertisements.show");
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

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    //    public function archieve($id){
//
//    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        //
    }
}
