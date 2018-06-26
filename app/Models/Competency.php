<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Competency extends Model
{
    protected $table = 'competencies';

    protected $guarded = ['id'];

    public function calendar()
    {
        return $this->hasOne('App\Models\Calendar');
    }

    public function date()
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->calendar()->value('start'))->format('d/m/Y');
    }

    public function type()
    {
        return $this->hasOne('App\Model\Competencies_types', 'type_id' , 'type_id')->value('name');
    }
}
