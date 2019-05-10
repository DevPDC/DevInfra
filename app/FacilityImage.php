<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FacilityImage extends Model
{
    protected $table = 'facility_images';

    public function facility()
    {
        return $this->belongsTo('App\Facility');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
