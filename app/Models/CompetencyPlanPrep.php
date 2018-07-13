<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompetencyPlanPrep extends Model
{
    protected $table = 'competency_planning_preparation';

    protected $guarded = ['id'];

    public function calendar()
    {
        return $this->belongsTo('App\Models\Calendar');
    }
}
