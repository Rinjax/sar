<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class dog_assessments extends Model
{
    protected $table = 'dog_assessments';

    protected $hidden = [
        'cal_mock_id', 'handler_id', 'dog_id', 'assessor_id'
    ];
    
    public function location(){
       return $this->hasOne('\App\Models\training_location');
    }


    public function getHandler ()
    {
        return $this->hasOne('App\Models\member','id','handler_id')->select(array('id','name'));
    }

    public function getAssessor ()
    {
        return $this->hasOne('App\Models\member','id','assessor_id')->select(array('id','name'));
    }

    public function getDog ()
    {
        return $this->hasOne('App\Models\dog','id','dog_id')->select(array('id','name'));
    }

    public function getDate()
    {
        return $this->hasOne('App\Models\cal_mock', 'id', 'cal_mock_id');
    }


        
}
