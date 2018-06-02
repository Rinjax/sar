<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class stock extends Model
{
    protected $table = 'stock';

    public function product()
    {
        return $this->belongsTo('App\Models\product');
    }
}
