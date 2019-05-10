<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $connection   =   'mysql';

    protected $table    =   'service_requests';

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function infrastructure()
    {
        return $this->belongsTo('App\Infrastructure');
    }

    public function status()
    {
        return $this->belongsTo('App\Status');
    }
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function station()
    {
        return $this->belongsTo('App\Station');
    }

    public function division(){
        return $this->belongsTo('App\Division');
    }

    public function log()
    {
        return $this->hasMany('App\Log');
    }

    public function logstatus()
    {
        return $this->belongsToMany('App\LogStatus');
    }

    public function inspection()
    {
        return $this->hasOne('App\Inspection');
    }

    public function technician()
    {
        return $this->belongsToMany('App\Technician','request_technician','post_id');
    }

    public function evaluation()
    {
        return $this->hasMany('App\Evaluation');
    }

    public function ticket()
    {
        return $this->hasOne('App\Ticket');
    }

    public function receiver()
    {
        return $this->belongsTo('App\Receiver');
    }

    public function priorities()
    {
        return $this->hasOne('App\Priority');
    }
}
