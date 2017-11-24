<?php

namespace App\Managers;

use \App\Models\member;
use \App\Models\members_training_completed;
use \App\Models\member_role;

class MemberManager
{
    public function addNewMember($name, $contact, $email, $callsign)
    {
        /**
         * Creates the new records for a member and return the new member's id
         */
        
        $member = member::firstOrCreate([
            'name' => $name,
            'contact' => $contact,
            'email' => $email,
            'callsign' => $callsign,
        ]);

        members_training_completed::firstorCreate([
            'member_id' => $member->id
        ]);
        
        return $member->id;
    }

    public function addMemberRoles($id, array $roles)
    {
        foreach($roles as $role_id){
            member_role::firstOrCreate([
                'member_id' => $id,
                'roles_id' => $role_id,
            ]);

        }
    }

   
}