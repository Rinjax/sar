<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class dog extends Model
{
    protected $table = 'dogs';
    protected $dates = ['DoB', 'start_program', 'op_ticket_exp'];
    public $timestamps = false;
    
    public function assessments(){
        //returns all assessments for a dog
        return $this->hasMany('\App\Models\dog_assessments');
    }

    public function getStatus(){

        return $this->hasOne('\App\Models\dog_status');
    }
}
