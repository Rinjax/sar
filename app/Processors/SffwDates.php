<?php
/**
 * Created by PhpStorm.
 * User: Jin
 * Date: 13/09/2017
 * Time: 22:17
 */

namespace App\Processors;

use Carbon\Carbon;



class SffwDates
{
    public function getSffwDates($user)
    {
        $currentDate = Carbon::now();

        if($user->getTrainingCompleted->firstaid !== null){
            $user->firstaid = new Carbon($user->getTrainingCompleted->firstaid);
            $user->firstaid_daysLeft = $currentDate ->diffInDays($user->firstaid, false) . 'days left';
            $user->firstaid = $user->firstaid->format('d/m/y');
        }
        else{
            $user->firstaid = 'Not Completed';
            $user->firstaid_daysLeft = '';
        }
        
        if($user->getTrainingCompleted->watersafety !== null){
            $user->waterSafety = new Carbon($user->getTrainingCompleted->watersafety);
            $user->waterSafety_daysLeft =  $currentDate ->diffInDays($user->waterSafety, false) . 'days left';
            $user->waterSafety = $user->waterSafety->format('d/m/y');
        }
        else{
            $user->waterSafety = 'Not Completed';
            $user->waterSafety_daysLeft = '';
        }
        
        if($user->getTrainingCompleted->fitness !== null){
            $user->fitness = new Carbon($user->getTrainingCompleted->fitness);
            $user->fitness_daysLeft =  $currentDate ->diffInDays($user->fitness, false) . 'days left';
            $user->fitness = $user->fitness->format('d/m/y');
        }
        else{
            $user->fitness = 'Not Completed';
            $user->daysLeft3 = '';
        }

        if($user->getTrainingCompleted->silvernavs !== null){
            $user->silvernavs = new Carbon($user->getTrainingCompleted->silvernavs);
            $user->silvernavs = $user->silvernavs->format('d/m/y');
        }
        else{
            $user->silvernavs = 'Not Completed';
        }


        return $user;
    }
}