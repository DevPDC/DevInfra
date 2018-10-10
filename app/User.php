<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract 
{

    use Authenticatable,CanResetPassword,Notifiable;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table  = 'users';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id','user_idno', 'username', 'password','last_login','created_by','is_active'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function posts()
    {
        return $this->hasMany('App\Posts');
    }
    
    public function profile()
    {
        return $this->hasOne('App\Profile');
    }

    public function save(array $options = array()) {
        if(isset($this->remember_token))
            unset($this->remember_token);
        return parent::save($options);
    }

    public function technician()
    {
        return $this->hasMany('App\Technician');
    }

}
