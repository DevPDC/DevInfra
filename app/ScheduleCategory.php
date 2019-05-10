<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ScheduleCategory extends Model
{
    public $timestamps = false;

    protected $table = 'lib_schedule_categories';

    public function maintenance()
    {
        return $this->hasMany('App\Maintenance');
    }
}
