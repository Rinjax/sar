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

    public function competencySearchTec()
    {
        return $this->hasMany('App\Models\CompetencySearchTechnician');
    }

    public function competencyFitness()
    {
        return $this->hasMany('App\Models\CompetencyFitness');
    }

    public function competencySearcherSafety()
    {
        return $this->hasMany('App\Models\CompetencySearcherSafety');
    }

    public function competencyWater()
    {
        return $this->hasMany('App\Models\CompetencyWaterAwareness');
    }

    public function competencySearcherSkills()
    {
        return $this->hasMany('App\Models\CompetencySearcherSkill');
    }

    public function competencyMisper()
    {
        return $this->hasMany('App\Models\CompetencyMisperBehaviour');
    }

    public function competencyBriefings()
    {
        return $this->hasMany('App\Models\CompetencyBriefing');
    }

    public function competencyCrimeScenes()
    {
        return $this->hasMany('App\Models\CompetencyCrimeScene');
    }

    public function competencyBLS()
    {
        return $this->hasMany('App\Models\CompetencyBLS');
    }

    public function competencyEvac()
    {
        return $this->hasMany('App\Models\CompetencyEvacuation');
    }

    public function competencyNav()
    {
        return $this->hasMany('App\Models\CompetencyNavigation');
    }

    public function competencyComms()
    {
        return $this->hasMany('App\Models\CompetencyRadioComm');
    }

    public function competencySearchOps()
    {
        return $this->hasMany('App\Models\CompetencySearchOperation');
    }

    public function competencyRoad()
    {
        return $this->hasMany('App\Models\CompetencyRoad');
    }

    public function competencyThrowLines()
    {
        return $this->hasMany('App\Models\CompetencyThrowLine');
    }

    public function competencyTeamLeader()
    {
        return $this->hasMany('App\Models\CompetencyTeamLeader');
    }

    public function competencyPlanPrep()
    {
        return $this->hasMany('App\Models\CompetencyPlanPrep');
    }

    public function competencyIncidentMgt()
    {
        return $this->hasMany('App\Models\CompetencyIncidentManagement');
    }

    public function competencyTeamMgt()
    {
        return $this->hasMany('App\Models\CompetencyTeamManagement');
    }
    public function competencyAnnualAssmt()
    {
        return $this->hasMany('App\Models\CompetencyAnnualAssessment');
    }



    
}
