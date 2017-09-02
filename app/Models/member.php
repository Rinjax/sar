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
        'name', 'password', 'gavatar', 'contact', 'email',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'gid', 'pivot', 'id', 'gavatar'
    ];
    
    
    public function roles(){
        return $this->belongsToMany('App\Models\roles','member_role')->select('role')->orderBy('role');
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
    
    public function getPriRole()
    {
        return $this->roles()->where('PriRole','1')->first();
    }
    
    public function getTrainingCompleted()
    {
        
        return $this->hasOne('App\Models\members_training_completed');   
    }
}
