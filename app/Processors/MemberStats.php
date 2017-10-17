<?php

namespace App\Processors;

use Carbon\Carbon;
use App\Models\cal_training;
use App\Models\cal_training_attendance;


class MemberStats
{
    public static function trainingRatioYear($member_id, $year = null)
    {

        $now = Carbon::now();
        if ($year == null){
            $year = $now->year;
        }
        
        $training = cal_training::whereYear('start', '=', $year)->whereDate('start','<=', $now->toDateString())->pluck('id')->toArray();
        //dd($training);
        $trainingCount = count($training);
        
        $trainingAttended = cal_training_attendance::where('member_id', $member_id)->whereIn('cal_training_id', array($training))->get();
        //dd($trainingAttended);
        $trainingAttendedCount = $trainingAttended->count();
        
        return round((($trainingAttendedCount / $trainingCount)*100),2);
    }
}