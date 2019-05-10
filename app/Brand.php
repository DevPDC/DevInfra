<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table = 'lib_supply_brands';

    public function supply()
    {
    return $this->hasMany('App\Supply');
    }

    public function profile()
    {
        return $this->belongsTo('App\Profile');
    }
}
