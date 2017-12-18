<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class dog extends Model
{
    protected $table = 'dogs';
    protected $dates = ['DoB', 'started', 'op_ticket_exp'];
    public $timestamps = false;

    protected $fillable = ['member_id', 'name', 'breed', 'started', 'level'];
    
    public function assessments(){
        //returns all assessments for a dog
        return $this->hasMany('\App\Models\dog_assessments');
    }
    
}
