<?php

namespace App\Managers;

use App\Models\calendar;
use App\Models\calendar_attendance;
use Carbon\Carbon;

class StatsManager 
{
    /**
     * Returns the percentage of 'team training' events attended for the member over the year
     * @param $member_id
     * @param null $year
     * @return float|int
     */
    public function getTrainingYearAttendancePercent($member_id, $year = null)
    {
        $now = Carbon::now();
        if ($year == null) $year = $now->year;

        $training = calendar::where('type', 'Team Training')->whereYear('start', '=', $year)->whereDate('start','<=', $now->toDateString())->pluck('id')->toArray();

        if(count($training) > 0 ){
            $trainingAttended = calendar_attendance::where('member_id', $member_id)->whereIn('calendar_id', $training)->get();


            $trainingAttendedCount = $trainingAttended->count();

            return round((($trainingAttendedCount / count($training))*100),2);
        }

        return 0;
    }


    /**
     * Returns the percentage of 'team training' events attended for the member over the month
     * @param $member_id
     * @param null $month
     * @return float|int
     */
    public function getTrainingMonthAttendancePercent($member_id, $month = null)
    {
        $now = Carbon::now();
        if ($month == null) $month = $now->month;

        $training = calendar::where('type', 'Team Training')->whereMonth('start', '=', $month)->whereDate('start','<=', $now->toDateString())->pluck('id')->toArray();

        if(count($training) > 0 ){
            $trainingAttended = calendar_attendance::where('member_id', $member_id)->whereIn('calendar_id', array($training))->get();
            $trainingAttendedCount = $trainingAttended->count();
            return round((($trainingAttendedCount / count($training))*100),2);
        }

        return 0;
    }


    public function cdpTileCSS()
    {
        
    }
}