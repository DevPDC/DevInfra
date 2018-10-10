<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    protected $connection   =   'mysql2';

    protected $table        =   'lib_stations';

    protected $primaryKey   =   'id_station';

    public function posts()
    {
        return $this->hasMany('App\Posts');
    }

    public function profile()
    {
        return $this->belongsTo('App\Profile');
    }
}
