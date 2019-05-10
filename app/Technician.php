<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Technician extends Model
{
    public function category()
    {
        return $this->belongsToMany('App\Category');
    }

    public function profile()
    {
        return $this->belongsTo('App\Profile','emp_idno','user_idno');
    }

    public function post()
    {
        return $this->belongsToMany('App\Posts','request_technician','technician_id','id');
    }
}
