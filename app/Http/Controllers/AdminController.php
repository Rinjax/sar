<?php

namespace App\Http\Controllers;

use App\Managers\MemberManager;
use App\Models\member_permission;
use App\Models\permission;
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

    public function permissionIndex()
    {
        $permssions = permission::with('members')->get();
        
        return view('admin.modifypermissions')->with(['permissions' => $permssions]);
    }
    
    public function getPermissionMembers($id)
    {
        $permission = permission::where('id', $id)->with('members')->first();

        $permissionMembers = $permission->members->pluck('id')->toArray();
        
        $members = member::where('active', 1)->select('id', 'name')->orderBy('name')->get();

        foreach($members as $k => $v){
            if(in_array($v->id, $permissionMembers)){
                $members->forget($k);
            }
        }
        
        return $members;
    }

    public function addPermissionMembers(Request $request)
    {
        $member_ids = member::where('active', 1)->pluck('id')->toArray();

        $permission_ids = permission::pluck('id')->toArray();

        if(!in_array($request->members_list, $member_ids)){
            Session::flash('error', 'Invalid Member Entered');
            return back();
        }

        if(!in_array($request->permission_id, $permission_ids)){
            Session::flash('error', 'Invalid Permission Group Was Entered');
            return back();
        }
        
        member_permission::updateOrCreate([
            'member_id' => $request->members_list,
            'permission_id' => $request->permission_id
        ]);

        return back();
    }

    public function removePermissionMembers(Request $request)
    {
        $remove_ids = $request->id;

        $ids = explode("_", $remove_ids);

        member_permission::where('member_id', $ids[0])
            ->where('permission_id', $ids[1])
            ->delete();

        return response('complete', 200);

    }
}
