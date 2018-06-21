<?php

namespace App\Http\Controllers;

use App\Managers\MemberManager;
use App\Models\MemberPermission;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Models\Dog;
use App\Models\Member;
use App\Models\MemberRole;
use App\Models\Roles;
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
        $activeId = Member::all()->pluck('callsign')->toArray();
        $roles = Roles::all();
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
            Dog::firstOrCreate([
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
        $permssions = Permission::with('members')->get();
        
        return view('admin.modifypermissions')->with(['permissions' => $permssions]);
    }
    
    public function getPermissionMembers($id)
    {
        $permission = Permission::where('id', $id)->with('members')->first();

        $permissionMembers = $permission->members->pluck('id')->toArray();
        
        $members = Member::where('active', 1)->select('id', 'name')->orderBy('name')->get();

        foreach($members as $k => $v){
            if(in_array($v->id, $permissionMembers)){
                $members->forget($k);
            }
        }
        
        return $members;
    }

    public function addPermissionMembers(Request $request)
    {
        $member_ids = Member::where('active', 1)->pluck('id')->toArray();

        $permission_ids = Permissions::pluck('id')->toArray();

        if(!in_array($request->members_list, $member_ids)){
            Session::flash('error', 'Invalid Member Entered');
            return back();
        }

        if(!in_array($request->permission_id, $permission_ids)){
            Session::flash('error', 'Invalid Permission Group Was Entered');
            return back();
        }
        
        MemberPermission::updateOrCreate([
            'member_id' => $request->members_list,
            'permission_id' => $request->permission_id
        ]);

        return back();
    }

    public function removePermissionMembers(Request $request)
    {
        $remove_ids = $request->id;

        $ids = explode("_", $remove_ids);

        MemberPermission::where('member_id', $ids[0])
            ->where('permission_id', $ids[1])
            ->delete();

        return response('complete', 200);

    }

    public function addAssetIndex()
    {
        return view('admin.addasset');
    }
}
