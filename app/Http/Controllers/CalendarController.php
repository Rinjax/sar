<?php

namespace App\Http\Controllers;

use App\Models\cal_training;
use App\Models\cal_training_attendance;
use App\Models\training_location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\cal_mock;
use App\Models\cal_mock_attendance;
use App\Models\member;
use Carbon\Carbon;


/**
 * @property mixed handler_id
 */
class CalendarController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        //does the user need the booking button?
        if ($user->hasRole('Mock Assessment')) {
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
        $location = $request->input('location');

        $locationid = \App\Models\training_location::where('name', $location)->first()->pluck('id');
        $mock = new \App\Models\cal_mock;
        $mock->start = $request->input('datetimepicker2');
        $mock->location_id = $locationid[0];
        $mock->note = $request->input('notes');
        $mock->save();

        $assessment = new \App\Models\dog_assessments();
        $assessment->cal_mock_id = $mock->id;
        $assessment->assessor_1_id = $request->input('assessor1');
        $assessment->assessor_2_id  = $request->input('assessor2');
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
                $cal_attend->cal_mock_id = $cal_id;
                $cal_attend->member_id = $user_id;
                $cal_attend->save();
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
                    $assessment = \App\Models\dog_assessments::where('cal_mock_id', $cal_id)->first();
                    if ($assessment->handler_id === null) {
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


    public function modifyEvent($id)
    {

        $event = cal_training::where('id', (int)$id )
            ->with('location')
            ->with('attendance')
            ->firstOrFail();

        $locations = training_location::all();

        $availableMembers = member::whereNotIn('name', $event->attendance)->get();
        //dd($event);
        
        //$time = new Carbon($event->start);
        
        $data = [
            'event' => $event,
            'locations' => $locations,
            'availableMembers' => $availableMembers
        ];


        return view('admin.modifyEvent')->with($data);
    }

    public function modifyEventPost(Request $request)
    {
        $event = cal_training::where('id', $request->input('eventID') )->firstOrFail();


        $event->location_id = $request->input('location');
        $event->start = $request->input('datetimepicker1');
        $event->note = $request->input('note');
        $event->save();

        $attendingArray = $request->input('members_selected');


        $oldAttends = cal_training_attendance::where('cal_training_id', $event->id)->get();



        foreach ($oldAttends as $oldAttend){
            if(!in_array($oldAttend->member_id, $attendingArray)){
                $oldAttend->delete();
            }
        }

        return response()->json(['ttt' => $attendingArray]);
        foreach($attendingArray as $newAttend){
            return response()->json(['ttt' => $newAttend]);
            if (!in_array($newAttend, $oldAttends)){
                $newAttend = new cal_training_attendance();
                $newAttend->cal_mock_id = $request->input('eventID');
                $newAttend->member_id = $newAttend;
                $newAttend->save();
            }
        }

        return response()->json(['success' => true, 'yay' => $attendingArray]);



    }

    
}
