<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Receiver extends Model
{
    protected $table = 'receive_posts';

    public function post()
    {
        return $this->hasMany('App\Posts');
    }
}
