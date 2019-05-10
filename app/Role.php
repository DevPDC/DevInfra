<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public $timestamps = false;

    public function user()
    {
        return $this->hasOne('App\RoleUser','role_user','role_id','id');
    }
}
