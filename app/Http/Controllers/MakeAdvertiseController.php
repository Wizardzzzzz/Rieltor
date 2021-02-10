<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MakeAdvertiseController extends Controller
{
    public function submit(Request $req)
    {
        $validation = $req->validate([
                'Name' => 'required|min:3|max:90',
                'Place' => 'required|min:3|max:150',
                'Type' => 'required|min:3|max:30',
                'Infastructure' => 'required|min:3|max:200'
            ]
        );
    }
}
