<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\training_location;
use App\Models\user;
use App\Models\roles;

class ModalController extends Controller
{
    public function index()
    {
        $locations = \App\Models\training_location::all();
        $assessors  = \App\Models\user::whereHas('roles',function($q){
            $q->where('role', 'Assessor');
        })->select('username')->get();
        
        $data = array(
            'locations'    => $locations,
            'assessors'    => $assessors,
        );
        return view ('modals')->with($data);
        
    }
}


