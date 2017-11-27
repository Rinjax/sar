<?php

namespace App\Http\Controllers;

use App\Managers\MemberManager;
use App\Models\roles;
use Illuminate\Http\Request;
use App\Models\member;
use App\Models\training_location;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Processors\SffwDates;
use App\Processors\MemberStats;

class ProfileController extends Controller
{

    protected $memberManager;

    public function __construct()
    {
        $this->memberManager = new MemberManager();
    }
    
    public function index (){
        
        $member = $this->memberManager->getMember();
        
        $this->memberManager->getLatestCPDDate($member);

        
        $trainingPercent = MemberStats::trainingRatioYear($user->id);
        


        if(Auth::user()->hasRole('Assessor')){
            $locations = training_location::all();
            $data['locations']= $locations;


            //assessor array hack to provide one assessor to the admin view
            $data['assessors1'] = collect([$user]);

            $assessors2 = roles::where('role', 'Qualified Handler')->first()->users()->get();
            $data['assessors2'] = $assessors2->except(Auth::id());
        }


        return view ('profile')->with($data);
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
