<?php
/**
 * Created by PhpStorm.
 * User: Jin
 * Date: 13/09/2017
 * Time: 22:17
 */

namespace App\Tasks;

use Carbon\Carbon;
use phpDocumentor\Reflection\Types\Null_;


class SffwDates
{
    public static function getSffwDates($user)
    {
        $currentDate = Carbon::now();

        if($user->getTrainingCompleted->firstaid !== null){
            $firstaid = new Carbon($user->getTrainingCompleted->firstaid);
            $daysLeft1 = $currentDate ->diffInDays($firstaid, false) . 'days left';
            $firstaid = 'Expires: ' . $firstaid->format('d/m/y');
        }
        else{
            $firstaid = 'Not Completed';
            $daysLeft1 = '';
        }
        
        if($user->getTrainingCompleted->watersafety !== null){
            $waterSafetyDate = new Carbon($user->getTrainingCompleted->watersafety);
            $daysLeft2 =  $currentDate ->diffInDays($waterSafetyDate, false) . 'days left';
            $waterSafetyDate = 'Expires: ' . $waterSafetyDate->format('d/m/y');
        }
        else{
            $waterSafetyDate = 'Not Completed';
            $daysLeft2 = '';
        }
        
        if($user->getTrainingCompleted->fitness !== null){
            $fitness = new Carbon($user->getTrainingCompleted->fitness);
            $daysLeft3 =  $currentDate ->diffInDays($fitness, false) . 'days left';
            $fitness = 'Expires: ' . $fitness->format('d/m/y');
        }
        else{
            $fitness = 'Not Completed';
            $daysLeft3 = '';
        }

        if($user->getTrainingCompleted->silvernavs !== null){
            $navs = new Carbon($user->getTrainingCompleted->silvernavs);
            $silvernavs = 'Completed: ' . $navs->format('d/m/y');
        }
        else{
            $silvernavs = 'Not Completed';
        }

        $data = array(
            'daysLeft1' => $daysLeft1,
            'daysLeft2' => $daysLeft2,
            'daysLeft3' => $daysLeft3,
            'silvernavs' => $silvernavs,
            'firstaid' => $firstaid,
            'water' => $waterSafetyDate,
            'fitness' => $fitness,
        );
        
        return $data;
    }
}