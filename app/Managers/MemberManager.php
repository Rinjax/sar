<?php

namespace App\Managers;

use App\Models\calendar;
use \App\Models\Member;
use \App\Models\Member_role;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


class MemberManager
{
    public function addNewMember($name, $contact, $email, $callsign)
    {
        /**
         * Creates the new records for a member and return the new member's id
         */
        
        $member = Member::firstOrCreate([
            'name' => $name,
            'contact' => $contact,
            'email' => $email,
            'callsign' => $callsign,
        ]);
        
        return $member->id;
    }

    public function addMemberRoles($id, array $roles)
    {
        foreach($roles as $role_id){
            MemberRole::firstOrCreate([
                'member_id' => $id,
                'roles_id' => $role_id,
            ]);

        }
    }


    public function getMember($id = null)
    {
        if($id == null) $id = Auth::id();
        
        return  Member::find($id)->with('roles')
            ->with('assets')
            ->with('competencySearchTec')
            ->with('competencyFitness')
            ->with('competencySearcherSafety')
            ->with('competencyWater')
            ->with('competencySearcherSkills')
            ->with('competencyMisper')
            ->with('competencyBriefings')
            ->with('competencyCrimeScenes')
            ->with('competencyBLS')
            ->with('competencyEvac')
            ->with('competencyNav')
            ->with('competencyComms')
            ->with('competencySearchOps')
            ->with('competencyRoad')
            ->with('competencyThrowLines')
            ->with('competencyTeamLeader')
            ->with('competencyPlanPrep')
            ->with('competencyIncidentMgt')
            ->with('competencyTeamMgt')
            ->with('competencyAnnualAssmt')
            ->first();
    }
   
}