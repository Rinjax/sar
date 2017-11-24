<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class member_role extends Model
{
    protected $table = 'member_role';
    
    protected $fillable = [
        'member_id', 'roles_id', 'PriRole'
    ];

    /*public function ()
    {
        return $this->hasOne('App\Models\training_locations');
    }*/

}