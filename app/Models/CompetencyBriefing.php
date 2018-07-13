<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompetencyBriefing extends Model
{
    protected $table = 'competency_briefings';

    protected $guarded = ['id'];

    public function calendar()
    {
        return $this->belongsTo('App\Models\Calendar');
    }
}
