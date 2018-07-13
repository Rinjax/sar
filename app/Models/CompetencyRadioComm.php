<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompetencyRadioComm extends Model
{
    protected $table = 'competency_radio_comms';

    protected $guarded = ['id'];

    public function calendar()
    {
        return $this->belongsTo('App\Models\Calendar');
    }
}
