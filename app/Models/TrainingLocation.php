<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrainingLocation extends Model
{
    protected $table = 'training_locations';
    protected $hidden = ['id','created_at', 'updated_at'];
}
