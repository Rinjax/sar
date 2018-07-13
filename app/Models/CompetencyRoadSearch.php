<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompetencyRoadSearch extends Model
{
    protected $table = 'competency_road_searching';

    protected $guarded = ['id'];

    public function calendar()
    {
        return $this->belongsTo('App\Models\Calendar');
    }
}
