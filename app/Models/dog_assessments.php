<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class dog_assessments extends Model
{
    protected $table = 'dog_assessments';
    protected $dates = ['date'];
    protected $dateFormat = 'd-m-Y';
    public $timestamps = false;
    
   public function location(){
       return $this->hasOne('\App\Models\training_location');
   }
   
   public function locationName(){
       return $this->hasOne('App\Models\training_location','id','location_id')->select('name');
   }
        
}
