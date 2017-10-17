<?php

namespace App\Http\Controllers;

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
    public function index (){

        $user = member::with(array(
            'roles' => function($query){$query->orderBy('role');},
            'getTrainingCompleted',
        ))->where('id', Auth::id()) ->first();


        SffwDates::getSffwDates($user);
        //$data = array_merge($data, $sffw);
        
        $trainingPercent = MemberStats::trainingRatioYear($user->id);

        $data = array(
            'member' => $user,
            'trainingPercent' => $trainingPercent
        );
        


        if(Auth::user()->hasRole('Assessor')){
            $locations = training_location::all();
            $data['locations']= $locations;


            //assessor array hack to provide one assessor to the admin view
            $data['assessors1'] = collect([$user]);

            $assessors2 = roles::where('role', 'Qualified Handler')->first()->users()->get();
            $data['assessors2'] = $assessors2->except(Auth::id());
        }


        return view ('profile')->with($data);
        //return $data;
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
