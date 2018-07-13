<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompetencyTeamLeader extends Model
{
    protected $table = 'competency_team_leader';

    protected $guarded = ['id'];

    public function calendar()
    {
        return $this->belongsTo('App\Models\Calendar');
    }
}
