<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MemberPermission extends Model
{
    protected  $table = 'member_permissions';
    
    protected $hidden = ['pivot',];
    
    protected $guarded = ['id'];
}