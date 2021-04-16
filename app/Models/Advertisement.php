<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    public function images()
    {
        return $this->hasOne("App\Models\Images", "adv_id");
    }

    public static function getAdvertiseById($id)
    {
        return Advertisement::where('id', $id)->get();
    }

    public static function setAdvertise($request)
    {
        $advertisement = new Advertisement();
        $advertisement->Name = $request->input("Name");
        $advertisement->TypeAdvertise = $request->input("TypeAdvertise");
        $advertisement->TypeHouse = $request->input("TypeHouse");
        $advertisement->Place = $request->input("Place");
        $advertisement->Address = $request->input("Address");
        $advertisement->Fettle = $request->input("Fettle");
        $advertisement->Benefits = $request->input("Benefits");
        $advertisement->Infrastructure = $request->input("Infrastructure");
        $advertisement->Area = $request->input("Area");
        $advertisement->RoomNum = $request->input("RoomNum");
        $advertisement->Superficiality = $request->input("Superficiality");
        $advertisement->About = $request->input("About");
        $advertisement->IsArchieved = 0;
        $advertisement->Price = $request->input("Price");
        $advertisement->save();
    }


    use HasFactory;
}
