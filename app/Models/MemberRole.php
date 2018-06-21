<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MemberRole extends Model
{
    protected $table = 'member_role';
    
    protected $fillable = [
        'member_id', 'roles_id'
    ];
    

}