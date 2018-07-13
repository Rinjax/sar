<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompetencySearchOperation extends Model
{
    protected $table = 'competency_search_operations';

    protected $guarded = ['id'];

    public function calendar()
    {
        return $this->belongsTo('App\Models\Calendar');
    }
}
