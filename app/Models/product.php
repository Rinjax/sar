<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    public function assets()
    {
        return $this->hasMany('App\Models\assest');
    }

    public function stock()
    {
        return $this->hasMany('App\Models\stock');
    }
}
