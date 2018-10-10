<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    
    protected $connection   =   'mysql2';

    protected $table        =   'lib_units';

    protected $primaryKey   =   'id_unit';

    public function profile()
    {
        return $this->belongsTo('App\Profile');
    }
}
