<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $table = 'service_logs';

    public $timestamps = false;

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->created_at = $model->freshTimestamp();
        });
    }
    
    public function post()
    {
        return $this->hasMany('App/Posts');
    }
    
    public function logstatus()
    {
        return $this->belongsTo('App\LogStatus');
    }
}
