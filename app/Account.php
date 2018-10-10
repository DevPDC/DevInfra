<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    
    protected $connection = 'mysql2';

    protected $table  = 'users';

    protected $primaryKey = 'userid';
    

    public function posts()
    {
        return $this->hasMany('App\Posts');
    }
    
    public function profile()
    {
        return $this->belongsTo('App\Profile');
    }
}