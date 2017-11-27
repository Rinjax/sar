<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class cpd_training extends Model
{
    public function calendar()
    {
        return $this->hasOne('App\Models\calendar');
    }
}
