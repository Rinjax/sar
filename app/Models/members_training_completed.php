<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class members_training_completed extends Model
{
    protected $table = 'members_training_completed';
    protected $dates = ['firstaid','fitness','silvernavs'];
    protected $dateFormat = 'd-m-Y';
    public $timestamps = false;

    protected $fillable = [
        'member_id'
    ];
    
 
        
}
