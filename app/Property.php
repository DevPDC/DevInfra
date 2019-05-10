<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    public $timestamps = false;
    
    protected $table = 'lib_property_categories';

    public function facility()
    {
        return $this->belongsTo('App\Facility');
    }

    public function facilityproperty()
    {
        return $this->hasMany('App\FacilityProperty');
    }
}
