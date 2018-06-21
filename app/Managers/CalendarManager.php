<?php

namespace App\Managers;

use App\Models\calendar;
use App\Models\CalendarAttendance;
use App\Models\DogAssessment;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class CalendarManager
{
    public function addCalendarEvent($type, $location, $start, $notes)
    {
        $cal = calendar::create([
            'type' => $type,
            'location_id' => $location,
            'start' => $start,
            'notes' => $notes
        ]);

        return $cal;

    }

    public function removeCalendarEvent($cal_id)
    {
        $cal = calendar::find($cal_id);

        $cal->delete();

        $this->removeAllAttendances($cal->id);
    }


    public function attendEvent($cal_id, $action)
    {

        $user = Auth::user();

        switch ($action) {
            case 'attend':
                CalendarAttendance::updateOrCreate(['calendar_id' => $cal_id, 'member_id' => $user->id]);

                break;

            case 'unattend':
                CalendarAttendance::where([
                    ['calendar_id', $cal_id], ['member_id', $user->id],
                ])->firstOrFail()->delete();
                break;

            case 'book':
                if ($user->hasPermission('Book Mock')) {
                    $assessment = \App\Models\DogAssessment::where('calendar_id', $cal_id)->first();

                    if ($assessment->handler_id === null) {
                        $assessment->handler_id = $user->id;
                        $assessment->dog_id = $user->dog->id;
                        $assessment->save();

                        CalendarAttendance::updateOrCreate(['calendar_id' => $cal_id, 'member_id' => $user->id]);

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

        $oldAttends = CalendarAttendance::where('calendar_id', $cal_id)->get();

        foreach ($oldAttends as $oldAttend){
            if(!in_array($oldAttend->member_id, $members)){
                $oldAttend->delete();
            }
        }
    }


    public function addAttendance($cal_id, $members =[])
    {
        if ($members == null) $members = [];
        
        $oldAttends = CalendarAttendance::where('calendar_id', $cal_id)->get();

        foreach($members as $member){

            if (!in_array($member, $oldAttends->pluck('member_id')->toArray())){
                CalendarAttendance::create([
                    'calendar_id' => $cal_id,
                    'member_id' => $member
                ]);
            }
        }
    }

    public function addDogAssessment($calendar_id, $assessor1)
    {
        DogAssessment::create([
            'calendar_id' => $calendar_id,
            'assessor_1_id' => $assessor1,
        ]);
    }


    public function allowBookMock()
    {
        $user = Auth::user();

        if ($user->hasPermission('Book Mock')) return true;

        return false;
    }

    protected function removeAllAttendances($cal_id)
    {
        CalendarAttendance::where('cal_id', $cal_id)->get()->delete();
    }
    
}