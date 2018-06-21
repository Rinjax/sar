<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    protected $table = 'calendar';

    protected $hidden = ['attendance'];

    protected $guarded = ['id'];

    
    public function location()
    {
        return $this->hasOne('App\Models\TrainingLocation','id','location_id');
    }
    
    public function attendance()
    {
        return $this->belongsToMany('App\Models\Member','CalendarAttendance')->orderBy('name');
    }
    
    
    public function isAttending($user_id)
    {
        foreach ($this->belongsToMany('App\Models\Member','CalendarAttendance')->get() as $attendee){
            if($user_id === $attendee->id){
                return true;
            }
        }
        return false;
    }

    public function dogAssessment()
    {
        return $this->hasOne('App\Models\DogAssessments');
    }
}
