<?php

namespace App\Managers;

use App\Models\calendar;
use App\Models\calendar_attendance;

class TimesheetManager
{
    public function getCalendarEvent($id)
    {
        $event =  calendar::where('id', (int)$id )->with('location')->firstOrFail();
        
        return $event;
    }

    public function getCalendarAttendance($id)
    {
        $attendance = calendar_attendance::where('calendar_id', $id)->with('member')->get();

        $attendance = $attendance->sortBy('member.name');
        
        return $attendance;
    }
}