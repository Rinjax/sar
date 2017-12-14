<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class calendar_attendance extends Model
{
    protected $table = 'calendar_attendance';

    protected  $fillable = ['calendar_id', 'member_id'];


    public function member()
    {
        return $this->belongsTo('App\Models\member')->orderBy('name');
    }
    
    

   

  
}
