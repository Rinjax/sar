<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class roles extends Model
{
    protected $table = 'roles';
    protected $hidden = ['pivot',];
    public $timestamps = false;
    
    protected $casts = [
        'role' => 'string',
    ];
    public function users(){
        //returns all users assigned to a peticular role
        return $this->belongsToMany('App\Models\user','member_role');
    }
        
}
