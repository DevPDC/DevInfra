<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    public $timestamps = false;
    
    protected $table = 'lib_ratings';

    public function evaluation()
    {
        return $this->hasMany('App\Evaluation');
    }
}
