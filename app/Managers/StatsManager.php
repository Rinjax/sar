<?php

namespace App\Managers;

use App\Models\calendar;
use App\Models\calendar_attendance;
use Carbon\Carbon;

class StatsManager 
{
    public function getTrainingYearAttendancePercent($member_id, $year = null)
    {
        $now = Carbon::now();
        if ($year == null) $year = $now->year;

        $training = count(calendar::where('type', 'Training')->whereYear('start', '=', $year)->whereDate('start','<=', $now->toDateString())->pluck('id')->toArray());

        if($training > 0 ){
            $trainingAttended = calendar_attendance::where('member_id', $member_id)->whereIn('calendar_id', array($training))->get();
            $trainingAttendedCount = $trainingAttended->count();
            return round((($trainingAttendedCount / $training)*100),2);
        }

        return 'No Training Events for this Year';
    }


    public function getTrainingMonthAttendancePercent($member_id, $month = null)
    {
        $now = Carbon::now();
        if ($month == null) $month = $now->month;

        $training = count(calendar::where('type', 'Training')->whereMonth('start', '=', $month)->whereDate('start','<=', $now->toDateString())->pluck('id')->toArray());

        if($training > 0 ){
            $trainingAttended = calendar_attendance::where('member_id', $member_id)->whereIn('calendar_id', array($training))->get();
            $trainingAttendedCount = $trainingAttended->count();
            return round((($trainingAttendedCount / $training)*100),2);
        }

        return 'No Training Events for this Month';
    }
}