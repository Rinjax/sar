<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompetencyCrimeScene extends Model
{
    protected $table = 'competency_crime_scenes';

    protected $guarded = ['id'];

    public function calendar()
    {
        return $this->belongsTo('App\Models\Calendar');
    }
}
