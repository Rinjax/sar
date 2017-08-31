<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cal_training;
use App\Models\cal_mock;
//use Session;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\cal_training_attendance;
use App\Models\cal_mock_attendance;


class CalFeedController extends Controller
{
    public function getCalEvents (){
        $cal_events = \App\Models\cal_training::all();
        $user_id = Auth::id();
        foreach($cal_events as $cal_event){
            $time = new Carbon($cal_event->start);
            $time = $time->format('H:i');
            $cal_event->location = $cal_event->location;
            $cal_event->title = $time . " Team Training";
            $cal_event->attendance = $cal_event->attendance;
            $cal_event->attending = $cal_event->isAttending($user_id);
            $cal_event->type = "training";
        }
        return $cal_events;
    }
    
    
    public function getCalMocks (Request $request){
        //$cal_events = \App\Models\cal_mock::all();

        $cal_events = \App\Models\cal_mock::with('getAssessmentDetails')

        ->where([
            ['start','>', $request->start],
            ['start','<', $request->end],
        ])/*->orwhere([
            ['end', '<', $request->end],
            ['end', '>', $request->start],
        ])*/->get();

        $user_id = Auth::id();
        foreach($cal_events as $cal_event){
            $time = new Carbon($cal_event->start);
            $titleTime = $time->format('H:i');
            $cal_event->type = "mock";
            $cal_event->location = $cal_event->location;
            $cal_event->title = $titleTime . " Mock Assessment";
            $cal_event->attendance = $cal_event->attendance;
            $cal_event->attending = $cal_event->isAttending($user_id);
            if($cal_event->handler !== NULL){
                $cal_event->handler = $cal_event->getHandlerName->name;
            }
            //$cal_event->assessor = $cal_event->getAssessorName->name;
        }
        return $cal_events;
    }
    
    public function getCalEvents1 (Request $request){
       /* $cal_events = \App\Models\cal_training::where([
            ['start','>=', $request->start],
            ['start','<=', $request->end],
        ])->orwhere([
            ['end', '<=', $request->end],
            ['end', '>=', $request->start],
        ])->get();*/
        
        $cal_events = \App\Models\cal_mock::where('id',1)->first();
        
        $attend = $cal_events->attendance;
        return $attend;
        
    }
    
}
