<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{

    protected $table = 'facilities_maintenance';

    public function scheduleCategory()
    {
        return $this->belongsTo('App\ScheduleCategory');
    }
}
