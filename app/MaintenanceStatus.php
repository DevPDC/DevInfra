<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MaintenanceStatus extends Model
{
    protected $table = 'lib_maintenance_status';

    public $timestamps = false;

    public function maintenance()
    {
        return $this->hasMany('App\Maintenance');
    }
}
