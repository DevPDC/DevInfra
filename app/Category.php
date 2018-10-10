<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'lib_categories';

    public $timestamps = false;

    public function posts()
    {
        return $this->hasMany('App\Posts');
    }
}
