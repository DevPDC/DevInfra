<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'lib_status';

    public $timestamps = false;

    public function posts()
    {
        return $this->hasMany('App\Posts');
    }
}
