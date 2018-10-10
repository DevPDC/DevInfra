<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    protected $connection   =   'mysql2';

    protected $table        =   'lib_divisions';

    protected $primaryKey   =   'id_division';

    public function posts()
    {
        return $this->hasMany('App\Division');
    }

    public function profile()
    {
        return $this->hasMany('App\Profile');
    }
}
