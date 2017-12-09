<?php

namespace App\Managers;

use App\Models\calendar;
use App\Models\calendar_attendance;
use App\Models\dog_assessments;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class CalendarManager
{
    public function addCalendarEvent($type, $location, $start, $note)
    {
        $cal = calendar::create([
            'type' => $type,
            'location_id' => $location,
            'start' => $start,
            'note' => $note
        ]);

        return $cal;

    }


    public function attendEvent($cal_id, $action)
    {

        $user = Auth::user();

        switch ($action) {
            case 'attend':
                calendar_attendance::create(['calendar_id' => $cal_id, 'member_id' => $user->id]);

                break;

            case 'unattend':
                calendar_attendance::where([
                    ['calendar_id', $cal_id], ['member_id', $user->id],
                ])->firstOrFail()->delete();
                break;

            case 'book':
                if ($user->hasPermission('Book Mock')) {
                    $assessment = \App\Models\dog_assessments::where('calendar_id', $cal_id)->first();
                    if ($assessment->handler_id === null) {
                        $assessment->handler_id = $user->id();
                        $assessment->dog_id = $user->dog->id;
                        $assessment->save();
                    } else {
                        Session::flash('error', 'Ah sorry, looks like this is already booked.');
                    }
                }
                else {
                    Session::flash('error', 'Ah sorry, looks like you dont have rights to book.');
                }
                break;
        }
    }


    public function updateCalendar($cal_id, $loc, $start, $note)
    {
        $cal = calendar::where('id', $cal_id)->update([
            'location_id' => $loc,
            'start' => $start,
            'notes' => $note
        ]);
    }

    public function removeAttendance($cal_id, $members = [])
    {
        if ($members == null) $members = [];

        $oldAttends = calendar_attendance::where('calendar_id', $cal_id)->get();

        foreach ($oldAttends as $oldAttend){
            if(!in_array($oldAttend->member_id, $members)){
                $oldAttend->delete();
            }
        }
    }


    public function addAttendance($cal_id, $members =[])
    {
        if ($members == null) $members = [];
        
        $oldAttends = calendar_attendance::where('calendar_id', $cal_id)->get();

        foreach($members as $member){

            if (!in_array($member, $oldAttends->pluck('member_id')->toArray())){
                calendar_attendance::create([
                    'calendar_id' => $cal_id,
                    'member_id' => $member
                ]);
            }
        }
    }

    public function addDogAssessment($calendar_id, $assessor1, $assessor2)
    {
        dog_assessments::create([
            'calendar_id' => $calendar_id,
            'assessor_1_id' => $assessor1,
            'assessor_2_id' => $assessor2,
        ]);
    }


    public function allowBookMock()
    {
        $user = Auth::user();

        if ($user->hasPermission('Book Mock')) return true;

        return false;
    }
    
}