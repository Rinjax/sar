<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompetencySearcherSafety extends Model
{
    protected $table = 'competency_searcher_safety';

    protected $guarded = ['id'];

    public function calendar()
    {
        return $this->belongsTo('App\Models\Calendar');
    }
}
