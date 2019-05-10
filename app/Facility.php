<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    public function infrastructure()
    {
        return $this->belongsTo('App\Infrastructure');
    }

    public function facilityimage()
    {
        return $this->hasOne('App\FacilityImage');
    }

    public function property()
    {
        return $this->hasMany('App\FacilityProperty');
    }

    public function facilityproperty()
    {
        return $this->hasMany('App\FacilityProperty');
    }

    public function operation()
    {
        return $this->hasMany('App\Operation');
    }
}
