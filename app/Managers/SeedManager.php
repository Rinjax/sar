<?php

namespace App\Managers;

use App\Models\dog;
use App\Models\member;
use Carbon\Carbon;

class SeedManager
{
    public function addMember($name)
    {
        $email = str_replace(' ', '.', $name) . '@searchdogssussex.com';
        
        member::create([
            'name' => $name,
            'contact' => '07777777777',
            'email' => $email,
            'callsign' => 'SD00'
        ]);
    }

    public function addDog($name)
    {

        dog::create([
            'name' => $name,
            'member_id' => 1,
            'breed' => 'Border Collie',
            'started' => Carbon::now()->format('Y-m-d'),
            'level' => 1,
        ]);
    }
    
    
}