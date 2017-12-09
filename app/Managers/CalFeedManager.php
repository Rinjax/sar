<?php

namespace App\Managers;

use App\Models\calendar;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class CalFeedManager
{
    public function getCalendarEvents()
    {
        $cals = calendar::all();
        $user_id = Auth::id();
        foreach($cals as $cal){
            $time = new Carbon($cal->start);
            $time = $time->format('H:i');
            $cal->location = $cal->location;
            $cal->title = $time ." ". $cal->type;
            $cal->attending = $cal->isAttending($user_id);
            $cal->attendances = $cal->attendance->pluck('name');
        }
        return $cals;
    }
}