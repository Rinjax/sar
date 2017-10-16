<?php

namespace App\Http\Controllers;

use App\Processors\memberStats;

class TestDevController extends Controller
{
    public function index()
    {
       $result =  memberStats::trainingRatioYear(1, 2017);

        return $result;
    }
}