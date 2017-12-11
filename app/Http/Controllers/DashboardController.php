<?php

namespace App\Http\Controllers;

use App\Models\member;
use Illuminate\Http\Request;


class DashboardController extends Controller
{
    public function index ()
    {
        $members = member::where('active', 1)->orderBy('name')->get();
        
        return view('dashboard')->with(['members' => $members]);
    }
}
