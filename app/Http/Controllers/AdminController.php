<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\dog;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index ()
    {
        //sort through a get available callsign for new members add
        $activeId = \App\Models\member::all()->pluck('callsign')->toArray();
        $roles = \App\Models\roles::all();
        $callsigns = config('sar.organisation.callsigns');
        $freeCallsigns = array_diff($callsigns, $activeId);

        $data = array(
            'freeCallsigns' => $freeCallsigns,
            'roles' => $roles
        );

        //return $data;
        return view ('admin')->with($data);
    }
}
