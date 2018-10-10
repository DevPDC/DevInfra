<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    
    protected $connection   =   'mysql2';

    protected $table        =   'lib_offices';

    protected $primaryKey   =   'id_office';

    public function profile()
    {
        return $this->hasMany('App\Profile');
    }
}
