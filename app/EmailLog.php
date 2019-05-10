<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmailLog extends Model
{
    public $timestamps = [ "created_at" ];

    public function emaillog()
    {
        return $this->hasMany('App\EmailLog');
    }
}
