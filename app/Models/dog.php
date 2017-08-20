<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class dog extends Model
{
    protected $table = 'dogs';
    protected $dates = ['DoB', 'start_program'];
    public $timestamps = false;
    
    public function assessments(){
        //returns all assessments for a dog
        return $this->hasMany('\App\Models\dog_assessments');
    }
        
}
