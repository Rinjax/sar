<?php

namespace App\Http\Controllers;

use App\Managers\MemberManager;
use App\Models\CalendarAttendance;
use App\Models\Member;
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
        $headers = ['Content-type'=>'text/plain'];

        $ical = "BEGIN:VCALENDAR\n" .
                "VERSION:2.0\n" .
                "PRODID:-//ZContent.net//Zap Calendar 1.0//EN\n" .
                "CALSCALE:GREGORIAN\n" .
                "METHOD:PUBLISH\n";

        $cals = calendar::all();

        foreach ($cals as $cal){
            if($cal->end == null){
                $cal->end = Carbon::createFromFormat('Y-m-d H:i:s', $cal->start)->addHours(5)->format('Y-m-d H:i:s');
            }

            $ical .= $this->vEvent($cal);
        }


        $ical .= "END:VCALENDAR\n";



        return Response::make($ical,200,$headers);
    }

    protected function vEvent($cal)
    {
        $event = "BEGIN:VEVENT\n" .
                 "SUMMARY:" . $cal->type . "\n" .
                 "DTSTAMP:" . str_replace(['U','C'], '', \Carbon\Carbon::now()->format('Ymd'.'T'.'His')) . "\n" .
                 "UID:" . $cal->id . "\n" .
                 "STATUS:CONFIRMED\n" .
                 "TRANSP:TRANSPARENT\n" .
                 "DTSTART:" . str_replace(['U','C'], '', \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $cal->start)->format('Ymd'.'T'.'His')) . "\n" .
                 "DTEND:" . str_replace(['U','C'], '', \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $cal->end)->format('Ymd'.'T'.'His')) . "\n" .
                 "LOCATION:" . $cal->location->name . "\n" .
                 "END:VEVENT\n";

        return $event;
    }
}