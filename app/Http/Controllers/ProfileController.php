<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\member;
use App\Models\training_location;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ProfileController extends Controller
{
    public function index (){

        $user = \App\Models\member::with(array('roles' => function($query){
            $query->orderBy('role');
         }))->where('id', Auth::id()) ->first();

        //need to sort out if user has no date
        $firstaid = new Carbon($user->getTrainingCompleted->firstaid);
        $waterSafetyDate = new Carbon($user->getTrainingCompleted->watersafety);
        $fitness = new Carbon($user->getTrainingCompleted->fitness);
        $navs = new Carbon($user->getTrainingCompleted->silvernavs);
        $currentDate = Carbon::now();
        $daysLeft1 =  $currentDate ->diffInDays($firstaid, false);
        $daysLeft2 =  $currentDate ->diffInDays($waterSafetyDate, false);
        $daysLeft3 =  $currentDate ->diffInDays($fitness, false);
        
        $silvernavs = $navs->format('d/m/y');
        $firstaid = $firstaid->format('d/m/y');
        $waterSafetyDate = $waterSafetyDate->format('d/m/y');
        $fitness = $fitness->format('d/m/y');

        
        $data = array(
            'member' => $user,
            'daysLeft1' => $daysLeft1,
            'daysLeft2' => $daysLeft2,
            'daysLeft3' => $daysLeft3,
            'silvernavs' => $silvernavs,
            'firstaid' => $firstaid,
            'water' => $waterSafetyDate,
            'fitness' => $fitness,
         );



        if(Auth::user()->hasRole('Assessor')){
            $locations =  \App\Models\training_location::all();
            $data['locations']=$locations;


            //assessor array hack to provide one assessor to the admin view
            $data['assessors'] = collect([$user->name]);
        }


        return view ('profile')->with($data);
        //return $data;
    }




    
    public function mobileUpdate(request $request) {
        
        $this->validate($request,[
           'newMob' => 'required|digits:11|regex:/^[07]{2}/'
        ]);

            $num = $request->input('newMob');
            $member_id = Auth::id();
            $member = \App\Models\member::where('id', $member_id) -> first();
            $member->contact = $num;
            $member->save();

        return redirect()->route('profile');
    }
}
