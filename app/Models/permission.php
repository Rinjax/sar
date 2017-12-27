<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class permission extends Model
{
    protected $table = 'permissions';
    protected $hidden = ['pivot',];

    protected $fillable = ['permission'];

    public function members(){
        //returns all users assigned to a peticular role
        return $this->belongsToMany('App\Models\member','member_permissions')->orderBy('name');
    }
}