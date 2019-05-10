<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    protected $table = 'evaluations';

    public function rating()
    {
        return $this->belongsTo('App\Rate','rate_id');
    }

    public function post()
    {
        return $this->belongsTo('App\Posts');
    }

    public function user()
    {
        return $this->belongsTo('App\User','user_id','user_idno');
    }
}
