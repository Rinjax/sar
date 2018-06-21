<?php

namespace App\Http\Controllers;

use App\Managers\MemberManager;
use Illuminate\Http\Request;
use App\Models\Member;
use App\Processors\SffwDates;


class ToController extends Controller
{

    protected $memberManager;

    public function __construct()
    {
        $this->memberManager = new MemberManager();
    }


    public function index()
    {
        $members = Member::where('active', 1)->get()->sortBy('name');

        foreach ($members as $member){
            $this->memberManager->getLatestCPDDate($member);
            $member->waterDays = $this->memberManager->getCDPExpiryInDays($member->water, 1);
            $member->firstaidDays = $this->memberManager->getCDPExpiryInDays($member->firstaid, 2);
            $member->navsDays = $this->memberManager->getCDPExpiryInDays($member->navs, 1);
            $member->fitnessDays = $this->memberManager->getCDPExpiryInDays($member->fitness, 1);
        }
        
        return view('to')->with(['members' => $members]);


    }
}
