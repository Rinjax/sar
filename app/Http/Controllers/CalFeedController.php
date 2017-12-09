<?php

namespace App\Http\Controllers;

use App\Managers\CalFeedManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;



class CalFeedController extends Controller
{
    protected $CalFeedManager;

    public function __construct()
    {
        $this->CalFeedManager = new CalFeedManager();
    }
    public function getCalEvents (){

        return $this->CalFeedManager->getCalendarEvents();
        
    }
    
    
    public function getCalMocks (Request $request){
        //$cal_events = \App\Models\cal_mock::all();

        $cal_events = cal_mock::with([
            'getAssessmentDetails.getHandler',
            'getAssessmentDetails.getAssessor1',
            'getAssessmentDetails.getAssessor2',
            'getAssessmentDetails.getDog'
        ])

       /* ->where([
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
            $cal_event->attendances = $cal_event->attendance->pluck('name');
            $cal_event->attending = $cal_event->isAttending($user_id);
        }
        return $cal_events;
    }
    

}
