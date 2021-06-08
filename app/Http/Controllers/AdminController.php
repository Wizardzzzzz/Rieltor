<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function indexAction(){
        $advertisement = ((new Advertisement())->where('IsArchieved','=','0'))->paginate(18);

        return view('admin.advertisement-table',compact("advertisement"));
    }
    public function addToArchieve($id){
        $advertisement =  Advertisement::find($id);
        $advertisement->IsArchieved = '1';
        $advertisement->save();
        return redirect()->route('advertisements.action');
    }
    public function archieve(){
        $advertisement = ((new Advertisement())->where('IsArchieved','=','1'))->paginate(18);
        return view('admin.archieve',compact("advertisement"));
    }
    public function users(){
        $users = (new User())->paginate(24);
        return view('admin.users',compact("users"));
    }

}
