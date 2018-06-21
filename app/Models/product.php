<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function assets()
    {
        return $this->hasMany('App\Models\Asset');
    }

    public function stock()
    {
        return $this->hasMany('App\Models\Stock');
    }
}
