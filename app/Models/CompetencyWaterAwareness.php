<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompetencyWaterAwareness extends Model
{
    protected $table = 'competency_water_awareness';

    protected $guarded = ['id'];

    public function calendar()
    {
        return $this->belongsTo('App\Models\Calendar');
    }
}
