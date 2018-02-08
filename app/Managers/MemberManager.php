<?php

namespace App\Managers;

use App\Models\calendar;
use \App\Models\member;
use \App\Models\member_role;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


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


    public function getMember($id = null)
    {
        if($id == null) $id = Auth::id();
        
        return  member::where('id', $id)->with('roles', 'assets')->first();
    }


    public function getLatestCPDDate(member $member)
    {

        $format = 'd/m/Y';

        $water = $member->cpdTraining->where('cpd_type', 'Water Safety')->last();

        if($water){
            $water = $water->calendar;
            $t = new Carbon($water->start);
            $t = $t->format($format);
            $member->water = $t;
        }else{
            $member->water = 'Not Completed';
        }

        //dd($member);


        ////////////////////////////////////////////////////////////////////////
        $firstaid = $member->cpdTraining->where('cpd_type', 'First Aid')->last();

        if($firstaid){
            $firstaid = calendar::where('id', $firstaid->calendar_id)->select('start')->first();
            $t = new Carbon($firstaid->start);
            $t = $t->format($format);
            $member->firstaid = $t;
        }else{
            $member->firstaid = 'Not Completed';
        }

        //////////////////////////////////////////////////////////////////////
        $navs = $member->cpdTraining->where('cpd_type', 'Navs')->last();

        if($navs){
            $navs = calendar::where('id', $navs->calendar_id)->select('start')->first();
            $t = new Carbon($navs->start);
            $t = $t->format($format);
            $member->navs = $t;
        }else{
            $member->navs = 'Not Completed';
        }

        //////////////////////////////////////////////////////////////////////
        $fitness = $member->cpdTraining->where('cpd_type', 'Fitness')->last();

        if($fitness){
            $fitness = calendar::where('id', $fitness->calendar_id)->select('start')->first();
            $t = new Carbon($fitness->start);
            $t = $t->format($format);
            $member->firness = $t;
        }else{
            $member->fitness = 'Not Completed';
        }
        
        return $member;
    }

    public function getCDPExpiryInDays($date, $years=0)
    {
       
       if($date != 'Not Completed'){
           $date = Carbon::createFromFormat('d/m/Y', $date)->addYears($years);

           $currentDate = Carbon::now();

           return $currentDate->diffInDays($date, false);
       }else{
           return 0;
       }



    }

   
}