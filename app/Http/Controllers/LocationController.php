<?php

namespace App\Http\Controllers;

use App\Models\training_location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index()
    {
        $locations = training_location::all()->sortBy('name');
        
        return view('locations')->with(['locations' => $locations]);
    }
}
