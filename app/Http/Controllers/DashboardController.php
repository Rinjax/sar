<?php

namespace App\Http\Controllers;

use App\Models\member;
use Illuminate\Http\Request;
use App\Models\dog;


class DashboardController extends Controller
{
    public function index ()
    {
        $members = member::where('active', 1)->orderBy('name')->get();
        
        $dogs = dog::where('active',1)->orderBy('name')->get();
        
        return view('dashboard')->with(['members' => $members, 'dogs' => $dogs]);
    }
}
