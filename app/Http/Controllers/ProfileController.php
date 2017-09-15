<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\member;
use App\Models\training_location;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{
    public function index (){

        $user = \App\Models\member::with(array('roles' => function($query){
            $query->orderBy('role');
         }))->where('id', Auth::id()) ->first();
        
        $data = array(
            'member' => $user,
         );


        $sffw = \App\Tasks\SffwDates::getSffwDates($user);
        $data = array_merge($data, $sffw);




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
            $member = \App\Models\member::where('id', Auth::id()) -> first();
            $member->contact = $num;
            $member->save();
            Session::flash('success', 'Contact number updated');

        return redirect()->route('profile');
    }
}
