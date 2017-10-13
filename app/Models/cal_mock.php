<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class cal_mock extends Model
{
    protected $table = 'cal_mock';
    protected $hidden = [
         'created_at', 'updated_at'
    ];

    
    public function location()
    {
        return $this->hasOne('App\Models\training_location','id','location_id');
    }
    
    public function attendance()
    {
        //return $this->hasManyThrough('App\Models\user','App\Models\cal_mock_attendance','cal_mock_id','id')->select('username')->orderBy('username');
        return $this->belongsToMany('App\Models\member','cal_mock_attendance')->select('name')->orderBy('name');
    }
    
    public function isAttending($user_id)
    {
        foreach ($this->belongsToMany('App\Models\member','cal_mock_attendance')->get() as $attendee){
            if($user_id === $attendee->id){
                return true;
            }
        }
        return false;
    }


    public function getAssessmentDetails()
    {
        return $this->hasOne('App\Models\dog_assessments')->select(array('cal_mock_id','handler_id','dog_id','assessor_1_id', 'assessor_2_id'));
    }
    
}
