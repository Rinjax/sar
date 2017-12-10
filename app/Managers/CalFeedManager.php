<?php

namespace App\Managers;

use App\Models\calendar;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class CalFeedManager
{
    public function getCalendarEvents()
    {
        $cals = calendar::with([
            'dogAssessment.getHandler',
            'dogAssessment.getAssessor1',
            'dogAssessment.getAssessor2',
            'dogAssessment.getDog'
        ])->get();
        $user_id = Auth::id();
        foreach($cals as $cal){
            $time = new Carbon($cal->start);
            $time = $time->format('H:i');
            $cal->location = $cal->location;
            $cal->title = $time ." ". $cal->type;
            $cal->attending = $cal->isAttending($user_id);
            $cal->attendances = $cal->attendance->pluck('name');

            /*
            if($cal->type == 'Mock Assessment'){
                $cal->handler = $cal->dogAssessment->getHandler;
                $cal->assessor1 = $cal->dogAssessment->getAssessor1;
                $cal->assessor2 = $cal->dogAssessment->getAssessor2;
                $cal->dog = $cal->dogAssessment->getDog;
            }*/
        }
        return $cals;
    }
}