<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompetencyFitness extends Model
{
    protected $table = 'competency_fitness';

    protected $guarded = ['id'];

    public function calendar()
    {
        return $this->belongsTo('App\Models\Calendar');
    }
}
