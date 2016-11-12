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
        'name', 'email', 'password', 'api_token',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'api_token',
    ];

    public function setPasswordAttribute($value)
    {
        $this->password = \Hash::make($value);
    }

    public function activate()
    {
        $this->active = 1;
        $this->save();

        return $this;
    }

    public static function getApiToken()
    {
        return \Auth::check() ? \Auth::user()->api_token : '';
    }
}
