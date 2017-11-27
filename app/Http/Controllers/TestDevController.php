<?php

namespace App\Http\Controllers;

use App\Models\member;
use App\Processors\memberStats;

class TestDevController extends Controller
{
    public function index()
    {
       //$result =  memberStats::trainingRatioYear(1, 2017);

        $s = member::where('id', 1)->first();



         dd($s->cpdTraining);
    }
}