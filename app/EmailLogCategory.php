<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmailLogCategory extends Model
{
    public $timestamps = false;

    public function emaillogcategory()
    {
        return $this->belongsTo('App\EmailLogCategory');
    }
}
