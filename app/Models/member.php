<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class member extends Authenticatable
{
    use Notifiable;
    
    protected $table = 'members';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'password', 'gavatar', 'contact', 'email', 'callsign',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'gid', 'pivot', 'gavatar'
    ];
    
    
    public function roles(){
        return $this->belongsToMany('App\Models\roles','member_role')->select('role')->orderBy('role');
    }

    public function permissions(){
        return $this->belongsToMany('App\Models\permission','member_permissions')->select('permission')->orderBy('permission');
    }
    
    public function hasRole($roleName)
    {
        foreach ($this->roles()->get() as $role)
        {
            if ($role->role == $roleName)
            {
                return true;
            }
        }

        return false;
    }

    public function hasPermission($permissionName)
    {
        foreach ($this->permissions()->get() as $permission)
        {
            if ($permission->permission == $permissionName)
            {
                return true;
            }
        }

        return false;
    }
    


    public function dog()
    {
        return $this->hasOne('App\Models\dog');
    }

    public function cpdTraining()
    {
        return $this->hasManyThrough('App\Models\cpd_training', 'App\Models\calendar_attendance', 'member_id', 'calendar_id');
    }
    
}
