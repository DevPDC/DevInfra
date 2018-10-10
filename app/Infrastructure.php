<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Infrastructure extends Model
{
    protected $table = 'lib_infrastructures';

    public function posts()
    {
        return $this->hasMany('App\Posts');
    }

    public function facility()
    {
        return $this->hasMany('App\Facility');
    }
}
