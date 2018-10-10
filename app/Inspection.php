<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inspection extends Model
{
    public $timestamps = false;

    public function post()
    {
        return $this->belongsTo('App\Posts');
    }

    public function supply()
    {
        return $this->belongsToMany('App\Supply');
    }
}
