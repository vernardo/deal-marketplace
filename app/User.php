<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'lastName', 'email', 'phone', 'password', 'isAdmin',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function orders() {
      //return $this->belongsToMany('App\Order');
      return $this->hasMany('App\Order');
    }

    public static function query() { // http://stackoverflow.com/questions/18339716/why-im-getting-non-static-method-should-not-be-called-statically-when-invokin
      //return $this->belongsToMany('App\Query');
      return $this->hasMany('App\Query');
    }
}
