<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\dog;
use App\Models\member;
use App\Models\member_role;
use App\Models\roles;
use App\Models\members_training_completed;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function index ()
    {
        //sort through a get available callsign for new members add
        $activeId = member::all()->pluck('callsign')->toArray();
        $roles = roles::all();
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


        $member = new member();
        $member->name = $request->name;
        $member->contact = $request->contact;
        $member->email = $request->email;
        $member->callsign = $request->callsign;
        $member->save();
        
        $training = new members_training_completed();
        $training->member_id = $member->id;
        $training->save();

        foreach($request->rolesarray as $role_id){
            $role = new member_role();
            $role->member_id = $member->id;
            $role->roles_id = $role_id;
            $role->save();
        }


        if($request->includeDog == 'on'){
            $dog = new dog();
            $dog->member_id = $member->id;
            $dog->name = $request->dogname;
            $dog->breed = $request->breed;
            $dog->level = $request->level;
            $dog->started = $request->
            $dog->save();
            Session::flash('success', 'Dog Added');
        }

        Session::flash('success', 'Member Added');

        return back();


    }
}
