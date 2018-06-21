<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DogAssessment extends Model
{
    protected $table = 'dog_assessments';

    protected $hidden = ['calendar_id', 'handler_id', 'dog_id', 'assessor_1_id', 'assessor_2_id'];

    protected $fillable = ['assessor_1_id','assessor_2_id','calendar_id','type_id'];
    
    public function location(){
       return $this->hasOne('\App\Models\TrainingLocation');
    }


    public function getHandler ()
    {
        return $this->hasOne('App\Models\Member','id','handler_id')->select(array('id','name'));
    }

    public function getAssessor1 ()
    {
        return $this->hasOne('App\Models\Member','id','assessor_1_id')->select(array('id','name'));
    }

    public function getAssessor2 ()
    {
        return $this->hasOne('App\Models\Member','id','assessor_2_id')->select(array('id','name'));
    }

    public function getDog ()
    {
        return $this->hasOne('App\Models\Dog','id','dog_id')->select(array('id','name'));
    }

    public function calendar()
    {
        return $this->belongsTo('App\Models\Calendar');
    }


        
}
