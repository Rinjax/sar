<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dog;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class OtoController extends Controller
{
    public function index ()
    {
        $dogs = \App\Models\Dog::orderBy('name')->get();

        foreach ($dogs as $dog){
            $st = new Carbon($dog->started);
            $st->format('d/m/Y');
            $dog->started = $st;
        }

        //dd($dogs);


        $data = array(
            'dogs' => $dogs,
        );


        /**
         * if user has admin for this page
         * 
         */

        if (Auth::user()->hasRole('Chairman')){
            $locations = \App\Models\training_location::orderBy('name')->get();
            $data['locations'] = $locations;
        }
        
        return view('oto')->with($data);
    }
}
