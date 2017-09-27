<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\dog;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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

    public function addMember(request $request)
    {


        $member = new \App\Models\member();
        $member->name = $request->name;
        $member->contact = $request->contact;
        $member->email = $request->email;
        $member->callsign = $request->callsign;
        $member->save();

        foreach($request->rolesarray as $role_id){
            $role = new \App\Models\member_role();
            $role->member_id = $member->id;
            $role->roles_id = $role_id;
            $role->save();
        }


        if($request->includeDog == 'on'){
            $dog = new \App\Models\dog();
            $dog->member_id = $member->id;
            $dog->name = $request->dogname;
            $dog->breed = $request->breed;
            $dog->level = $request->level;
            $dog->save();
        }

        return back();


    }
}
