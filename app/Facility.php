<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    public function infrastructure()
    {
        return $this->belongsTo('App\Infrastructure');
    }
}
