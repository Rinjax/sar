<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    protected $table = 'assets';
    
    protected $guarded = ['id'];
    
    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }
    
    public function member()
    {
        return $this->belongsTo('App\Models\Member');
    }
}
