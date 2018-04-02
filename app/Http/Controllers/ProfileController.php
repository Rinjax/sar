<?php

namespace App\Http\Controllers;

use App\Managers\MemberManager;
use App\Managers\StatsManager;
use App\Models\roles;
use Illuminate\Http\Request;
use App\Models\member;
use App\Models\training_location;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Processors\SffwDates;
use App\Processors\MemberStats;
use ConsoleTVs\Charts\Facades\Charts;

class ProfileController extends Controller
{

    protected $memberManager;

    protected $statsManager;

    public function __construct()
    {
        $this->memberManager = new MemberManager();
        
        $this->statsManager = new StatsManager();
    }
    
    public function index (){
        
        $member = $this->memberManager->getMember();
        
        $this->memberManager->getLatestCPDDate($member);

        $member->waterDays = $this->memberManager->getCDPExpiryInDays($member->water, 1);
        $member->firstaidDays = $this->memberManager->getCDPExpiryInDays($member->firstaid, 2);
        $member->navsDays = $this->memberManager->getCDPExpiryInDays($member->navs, 1);
        $member->fitnessDays = $this->memberManager->getCDPExpiryInDays($member->fitness, 1);

        $member->percentYear = $this->statsManager->getTrainingYearAttendancePercent($member->id);
        $member->percentMonth = $this->statsManager->getTrainingMonthAttendancePercent($member->id);

        $chart = Charts::create('percentage', 'justgage')
            ->title('Attendance Yr')
            ->elementLabel('percent')
            ->values([$member->percentYear,0,100])
            ->responsive(true)
            ->height(300)
            ->width(0)
            ->loader(false);

        $chart2 = Charts::create('percentage', 'justgage')
            ->title('Attendance Mth')
            ->elementLabel('percent')
            ->colors(['#8A2BE2'])
            ->values([$member->percentMonth,0,100])
            ->responsive(true)
            ->height(300)
            ->width(0)
            ->loader(false);

        return view ('profile')->with(['member' => $member, 'chart' => $chart, 'chart2' => $chart2]);
    }




    
    public function mobileUpdate(request $request) {
        
        $this->validate($request,[
           'newMob' => 'required|digits:11|regex:/^[07]{2}/'
        ]);

            $num = $request->input('newMob');
            $member = \App\Models\member::where('id', Auth::id()) -> first();
            $member->contact = $num;
            $member->save();
            Session::flash('success', 'Contact number updated');

        return redirect()->route('profile');
    }
}
