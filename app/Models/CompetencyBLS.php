<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompetencyBLS extends Model
{
    protected $table = 'competency_basic_life_support';

    protected $guarded = ['id'];

    public function calendar()
    {
        return $this->belongsTo('App\Models\Calendar');
    }
}
