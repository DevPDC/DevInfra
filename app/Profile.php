<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $connection   =   'mysql2';

    protected $table        =   'employees';

    protected $primaryKey   =   'id_employee';

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function division()
    {
        return $this->belongsTo('App\Division');
    }

    public function station()
    {
        return $this->hasOne('App\Station');
    }

    public function office()
    {
        return $this->hasOne('App\Office');
    }

    public function unit()
    {
        return $this->hasOne('App\Unit');
    }

    public function position()
    {
        return $this->hasOne('App\Position');
    }
}
