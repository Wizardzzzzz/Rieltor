<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use App\Models\Images;

use Illuminate\Http\Request;

class MakeAdvertiseController extends Controller
{


    private function validation(Request $req)
    {
        $validation = $req->validate([
                'Name' => 'required|min:3|max:90',
                'Place' => 'required|min:3|max:150',
                'Type' => 'required|min:3|max:30',
                'Infrastructure' => 'required|min:3|max:200'
            ]
        );

    }
 private function saveImage($id){

$count = 0;
     foreach ($_FILES['photos']['name'] as $key){
         $file = "../upload/".basename($_FILES['photos']['name'][$count]);

        if(move_uploaded_file($_FILES['photos']['tmp_name'][$count], $file)){
            $image = new Images();
            $image->adv_id =$id;
            $image->path =  $key;
            $image->save();
            $count++;
        }
     }
    }
    public function submit(Request $request){
        $table= \DB::select("show table status like '" . "advertisements" . "'");
        $id = $table[0]->Auto_increment;
        $this->validation($request);
        $this->saveImage($id);
        $advertisement = new Advertisement();
        $advertisement->Name = $request->input("Name");
        $advertisement->Place = $request->input("Place");
        $advertisement->RoomNum = $request->input("RoomNum");
        $advertisement->TypeHouse = $request->input("Type");
        $advertisement->Infrastructure = $request->input("Infrastructure");
        $advertisement->Area = $request->input("Area");
        $advertisement->About = $request->input("About");
        $advertisement->IsArchieved = 0;
        $advertisement->Price = $request->input("Price");
        $advertisement->save();
      return redirect()->route("home");
    }
    public function allData(){
        return view('main',['data'=>Advertisement::all()],['image'=>Images::all()]);
    }
}
