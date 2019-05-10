<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FacilityProperty extends Model
{
    protected $table = 'facility_properties';

    public function facility()
    {
        return $this->belongsTo('App\Facility');
    }

    public function property()
    {
        return $this->belongsTo('App\Property');
    }
}
