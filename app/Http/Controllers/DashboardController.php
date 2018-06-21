<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use App\Models\Dog;


class DashboardController extends Controller
{
    public function index ()
    {
        $members = Member::where('active', 1)->orderBy('firstname')->orderBy('surname')->get();
        
        $dogs = Dog::where('active',1)->orderBy('name')->get();
        
        return view('dashboard')->with(['members' => $members, 'dogs' => $dogs]);
    }
}
