<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Member extends Authenticatable
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


    public function fullname()
    {
        return $this->firstname . ' ' . $this->surname;
    }
    public function roles(){
        return $this->belongsToMany('App\Models\Roles','member_roles')->select('role')->orderBy('role');
    }

    public function permissions(){
        return $this->belongsToMany('App\Models\Permission','member_permissions')->select('permission')->orderBy('permission');
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

            if ($permission->permission == $permissionName || $permission->permission === 'dev')
            {
                return true;
            }
        }

        return false;
    }
    


    public function dog()
    {
        return $this->hasOne('App\Models\Dog');
    }
    

    public function assets()
    {
        return $this->hasMany('App\Models\Asset');
    }

    public function competencies()
    {
        return $this->hasMany('App\Models\Competency')
            ->leftJoin('calendar', 'competencies.calendar_id', '=', 'calendar.id')
            ->select('competencies.type_id', 'member_id', 'start as created_at', 'competencies.notes');
    }

    public function recentCompetencies()
    {
        return $this->competencies()->orderBy('start', 'desc')->groupBy('type_id')->get();
        //return $this->competencies->unique('type_id')->latest();
    }
    
}
