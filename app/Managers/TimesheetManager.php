<?php

namespace App\Managers;

use App\Models\calendar;
use App\Models\CalendarAttendance;

class TimesheetManager
{
    public function getCalendarEvent($id)
    {
        $event =  calendar::where('id', (int)$id )->with('location')->firstOrFail();
        
        return $event;
    }

    public function getCalendarAttendance($id)
    {
        $attendance = CalendarAttendance::where('calendar_id', $id)->with('member')->get();

        $attendance = $attendance->sortBy('member.name');
        
        return $attendance;
    }
}