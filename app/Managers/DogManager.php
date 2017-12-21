<?php

namespace App\Managers;

use Carbon\Carbon;


class DogManager
{
    public function getTicketExpiryDays($date, $years=2)
    {

        if($date != null ){
            $date = Carbon::parse($date)->addYears($years);

            $currentDate = Carbon::now();

            return $currentDate->diffInDays($date, false);
        }else{
            return 0;
        }



    }
}