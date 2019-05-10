<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $table = 'request_tickets';

    public function post()
    {
        return $this->belongsTo('App\Posts');
    }
}
