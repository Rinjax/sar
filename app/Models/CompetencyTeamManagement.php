<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompetencyTeamManagement extends Model
{
    protected $table = 'competency_team_management';

    protected $guarded = ['id'];

    public function calendar()
    {
        return $this->belongsTo('App\Models\Calendar');
    }
}
