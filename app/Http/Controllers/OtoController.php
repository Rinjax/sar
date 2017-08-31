<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\dog;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class OtoController extends Controller
{
    public function index ()
    {
        $dogs = \App\Models\dog::orderBy('name')->get();

        foreach ($dogs as $dog){
            $st = new Carbon($dog->start_program);
            $st->format('d/m/Y');
            $dog->start_program = $st;
        }

        if (Auth::user()->hasRole('Chairman')){
            $locations = \App\Models\training_location::orderBy('name')->get();
        }

        $data = array(
            'dogs' => $dogs,
            'locations' => $locations,
        );
        
        return view('oto')->with($data);
    }
}
