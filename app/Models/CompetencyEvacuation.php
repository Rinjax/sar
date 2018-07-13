<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompetencyEvacuation extends Model
{
    protected $table = 'competency_evacuation_handling';

    protected $guarded = ['id'];

    public function calendar()
    {
        return $this->belongsTo('App\Models\Calendar');
    }
}
