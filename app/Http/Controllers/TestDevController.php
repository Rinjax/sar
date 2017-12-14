<?php

namespace App\Http\Controllers;

use App\Managers\MemberManager;
use App\Models\calendar_attendance;
use App\Models\member;
use App\Processors\memberStats;
use Carbon\Carbon;

class TestDevController extends Controller
{
    public function index()
    {

        //timesheet calc for differences

       $rec = calendar_attendance::where('id', 13)->first();

        $in = Carbon::createFromFormat('H:i:s', $rec->clock_in);

        $out = Carbon::createFromFormat('H:i:s', $rec->clock_out);

        if($out->lt($in)) $out->addDay();

        $h = ($in->diffInMinutes($out, false) / 60);

        $m =($in->diffInMinutes($out, false) % 60);

        dd($in, $out, $h, $m);
    }
}