<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class asset extends Model
{
    public function product()
    {
        return $this->belongsTo('App\Models\product');
    }
    
    public function member()
    {
        return $this->belongsTo('App\Models\member');
    }
}
