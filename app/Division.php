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
        return $this->hasMany('App\Posts');
    }

    public function profile()
    {
        return $this->hasMany('App\Profile','id_division','emp_division');
    }
}
