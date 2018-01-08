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

       return json_encode(member::all());
    }
}