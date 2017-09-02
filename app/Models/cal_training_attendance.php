<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class cal_training_attendance extends Model
{
    protected $table = 'cal_training_attendance';

   // protected $dates = ['created_at', 'updated_at'];
    public $timestamps = true;
    
    /*public function ()
    {
        return $this->hasOne('App\Models\training_locations');
    }*/
}
