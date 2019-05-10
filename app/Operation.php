<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{
    protected $table = 'genset_operations';

    public function facility()
    {
        return $this->belongsTo('App\Facility');
    }
}
