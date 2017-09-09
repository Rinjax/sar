<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\cal_mock;
use App\Models\cal_mock_attendance;
use App\Models\member;
use Carbon\Carbon;


class CalendarController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        //does the user need the booking button
        if ($user->hasRole('bob')) {
            $bookButton = true;
        }
        else{
            $bookButton = false;
        }
        
        $data = array(
            'bookButton' => $bookButton
        );


        //return $user;
        return view('calendar')->with($data);
    }

    public function addEvent(request $request)
    {
        $type = $request->input('eventType');
        $date = $request->input('datetimepicker1');
        $location = $request->input('location');
        $notes = $request->input('notes');

        $data = array(
            'type' => $type,
            'date' => $date,
            'location' => $location,
            'notes' => $notes
        );
        return $data;
    }

    public function addMockEvent(request $request)
    {
        $date = $request->input('datetimepicker2');
        $location = $request->input('location');
        $assessor = $request->input('assessor');
        $notes = $request->input('notes');

        $locationid = \App\Models\training_location::where('name', $location)->first()->pluck('id');
        $mock = new \App\Models\cal_mock;
        $mock->start = $date;
        $mock->location_id = $locationid[0];
        $mock->note = $notes;
        $mock->save();

        $assessment = new \App\Models\dog_assessments();
        $assessment->cal_mock_id = $mock->id;
        $assessment->assessor_id = Auth::id();
        $assessment->save();

        Session::flash('success', 'event created');

        return back();
    }


    public function attendMockEvent(Request $request)
    {

        //return $request->all();
        $cal_id = $request->input('mock_id');
        $user_id = Auth::id();

        switch ($request['calButton']) {
            case 'attend':
                $cal_attend = new \App\Models\cal_mock_attendance;
                if (checkCalExpired($cal_attend->start)) {
                    $cal_attend->cal_mock_id = $cal_id;
                    $cal_attend->member_id = $user_id;
                    $cal_attend->save();
                } else {
                    Session::flash('calevent.expired', 'You cannot attend an event that has already past!');
                    back();
                }

                break;

            case 'unattend':
                $cal_unattend = \App\Models\cal_mock_attendance::where([
                    ['cal_mock_id', $cal_id],
                    ['member_id', $user_id],
                ])->firstOrFail();
                $cal_unattend->delete();
                break;

            case 'book':
                if (Auth::user()->hasRole('Mock Assessment')) {
                    $assessment = \App\Models\dog_assessments::where('cal_mock_id', $cal_id);
                    if ($assessment->handler_id == null) {
                        $assessment->handler_id = Auth::id();
                        $assessment->dog_id = Auth::user()->dog->id;
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


        //Session::flash('success', 'Event updated!');

        return redirect()->route('calendar');
    }


    public function attendCalEvent(Request $request)
    {

        $cal_id = $request->input('cal_id');
        $user_id = Auth::id();

        switch ($request['calButton']) {

            case 'attend':
                $cal_attend = new \App\Models\cal_training_attendance;
                $cal_attend->cal_training_id = $cal_id;
                $cal_attend->member_id = $user_id;
                $cal_attend->save();
                break;

            case 'unattend':
                $cal_unattend = \App\Models\cal_training_attendance::where([
                    ['cal_training_id', $cal_id],
                    ['member_id', $user_id],
                ])->firstOrFail();
                $cal_unattend->delete();
                break;
        }


        return redirect()->route('calendar');

    }


    private function checkCalExpired($date)
    {
        $now = Carbon::now();
        $start = Carbon::createFromDate($date);
        if ($now->lt($start)) {
            return true;
        } else {
            return false;
        }


    }
}
