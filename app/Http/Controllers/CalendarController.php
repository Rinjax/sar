<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\cal_mock;
use App\Models\cal_mock_attendance;
use App\Models\member;

class CalendarController extends Controller
{
    public function index (){
        
        //does the user need the booking button
        $bookButton = false;
        $user = Auth::user();
        if($user->hasRole('Assessor')){
            $bookButton = true;
        }
        $data = array(
            'bookButton' => $bookButton
        );
        
        
        //return $user;
        return view ('calendar')->with($data);
    }
    
    public function addEvent (request $request){
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
    
    public function addMockEvent (request $request){
        $date = $request->input('datetimepicker2');
        $location = $request->input('location');
        $assessor = $request->input('assessor');
        $notes = $request->input('notes');
        
        $data = array(
            'assessor' => $assessor,
            'date' => $date,
            'location' => $location,
            'notes' => $notes
        );
        return $data;
    }
    
    
    
    public function attendMockEvent (Request $request){
        
        //return $request->all();
        $cal_id  = $request->input('mock_id');
        //$cal_event = \App\Models\cal_mock::findOrFail($cal_id);
        $user_id = Auth::id();
        
        switch ($request['calButton']){
            
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
                $cal_event = \App\Models\cal_mock::findOrFail($cal_id);
                if($cal_event->handler == null){
                    $cal_event->handler = $user_id;
                    $cal_event->save();
                }
       
                break;
        }

        return redirect()->route('calendar');
        
    }
    
    
    public function attendCalEvent (Request $request){
        
        //return $request->all();
        $cal_id  = $request->input('cal_id');
        $cal_event = \App\Models\cal_training::findOrFail($cal_id);
        $user_id = Auth::id();
        
        switch ($request['calButton']){
            
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
}
