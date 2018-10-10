<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogStatus extends Model
{
    protected $table = 'lib_log_status';

    public $timestamps = false;

    // public static function boot()
    // {
    //     parent::boot();

    //     static::creating(function ($model) {
    //         $model->created_at = $model->freshTimestamp();
    //     });
    // }

    public function log()
    {
        return $this->hasMany('App\Log');
    }
}
