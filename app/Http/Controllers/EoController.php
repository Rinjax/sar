<?php

namespace App\Http\Controllers;

use App\Models\asset;
use App\Models\stock;
use Illuminate\Http\Request;

class EoController extends Controller
{
    public function index()
    {
        $equipment = asset::all();
        $stock = stock::all();
        
        return view('eo')->with(['stock' => $stock, 'equipment' => $equipment]);
    }
}
