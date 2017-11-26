<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class calendar extends Model
{
    protected $table = 'calendar';

    protected $hidden = ['attendance'];

    
    public function location()
    {
        return $this->hasOne('App\Models\training_location','id','location_id');
    }
    
    public function attendance()
    {
        return $this->belongsToMany('App\Models\member','calendar_attendance');
    }
    
    
    public function isAttending($user_id)
    {
        foreach ($this->belongsToMany('App\Models\member','calendar_attendance')->get() as $attendee){
            if($user_id === $attendee->id){
                return true;
            }
        }
        return false;
    }
}
