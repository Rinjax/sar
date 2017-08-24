<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\dog;
use Carbon\Carbon;

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

        $data = array(
            'dogs' => $dogs,
        );
        
        return view('oto')->with($data);
    }
}
