<?php

namespace App\Http\Controllers;

use App\Managers\MemberManager;
use App\Managers\StatsManager;
use Illuminate\Http\Request;
use App\Models\training_location;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
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
            $member = \App\Models\Member::where('id', Auth::id()) -> first();
            $member->contact = $num;
            $member->save();
            Session::flash('success', 'Contact number updated');

        return redirect()->route('profile');
    }
}
