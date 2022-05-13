<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'email', 'password', 'credits', 'slots', 'refid', 'banned', 'userlevel', 'active'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function websites()
    {
        return $this->hasMany('App\Website');
    }

    public function transfers()
    {
        return $this->hasMany('App\Transfer', 'receiver');
    }

    public function activities()
    {
        return $this->hasMany('App\UserActivity', 'user_id');
    }
 
    public function paymenthistory()
    {
        return $this->hasMany('App\PaymentHistory', 'user_id');
    }
}
