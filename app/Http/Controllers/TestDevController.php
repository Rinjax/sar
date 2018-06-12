<?php

namespace App\Http\Controllers;

use App\Managers\MemberManager;
use App\Models\calendar_attendance;
use App\Models\member;
use App\Processors\memberStats;
use Carbon\Carbon;
use Illuminate\Support\Facades\Response;
use App\Models\calendar;

class TestDevController extends Controller
{
    public function index()
    {

       return view('locations');
    }

    public function ical()
    {
        $cals = calendar::all();

        foreach ($cals as $cal){
            if($cal->end == null){
                $cal->end = Carbon::createFromFormat('Y-m-d H:i:s', $cal->start)->addHours(5)->format('Y-m-d H:i:s');
            }
        }

        $ical = view('iCal.vcalendar')->with('cals', $cals)->render();

        return ($ical);
    }
}