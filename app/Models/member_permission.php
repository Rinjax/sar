<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class member_permission extends Model
{
    protected  $table = 'member_permissions';
    protected $hidden = ['pivot',];
}