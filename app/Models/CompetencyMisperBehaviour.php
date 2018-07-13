<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompetencyMisperBehaviour extends Model
{
    protected $table = 'competency_misper_behaviour';

    protected $guarded = ['id'];

    public function calendar()
    {
        return $this->belongsTo('App\Models\Calendar');
    }
}
