<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supply extends Model
{

    public function inspection()
    {
        return $this->belongsToMany('App\Inspection');
    }
}
