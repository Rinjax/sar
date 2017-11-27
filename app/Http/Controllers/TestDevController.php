<?php

namespace App\Http\Controllers;

use App\Managers\MemberManager;
use App\Models\member;
use App\Processors\memberStats;

class TestDevController extends Controller
{
    public function index()
    {
       //$result =  memberStats::trainingRatioYear(1, 2017);

        $s = new MemberManager();

        $m = $s->getMember(1);
//dd($m);

        $m = $s->getLatestCPDDate($m);

         dd($m);
    }
}