<?php

namespace App\Http\Controllers;

use App\Managers\MemberManager;
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
    protected $memberManager;

    public function __construct()
    {
        $this->memberManager = new MemberManager();
    }
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
        //dd($request);

        $id = $this->memberManager->addNewMember(
            $request->name,
            $request->contact,
            $request->email,
            $request->callsign
        );

        $this->memberManager->addMemberRoles($id, $request->rolesarray);

        if($request->includeDog == 'on'){
            dog::firstOrCreate([
                'member_id' => $id,
                'name' => $request->dogname,
                'breed' => $request->breed,
                'level' => $request->level,
                'started' => $request->datetimepickerDog,
            ]);

            Session::flash('success', 'Dog Added');
        }

        Session::flash('success', 'Member Added');

        return back();


    }
}
