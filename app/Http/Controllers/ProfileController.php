<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\member;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ProfileController extends Controller
{
    public function index (){
        $user = \App\Models\member::with(array('roles' => function($query){
            $query->orderBy('role');
         }))->where('id', Auth::id()) -> first();
        
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
       
        return view ('profile')->with($data);
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
