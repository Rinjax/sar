<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class cpd_training extends Model
{

    protected $table = 'cpd_training';


    public function calendar()
    {
        return $this->hasOne('App\Models\calendar');
    }
}
