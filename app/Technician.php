<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Technician extends Model
{
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function profile()
    {
        return $this->belongsTo('App\User');
    }
}
