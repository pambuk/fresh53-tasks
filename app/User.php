<?php
namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'api_token',
    ];

    protected $hidden = [
        'password', 'remember_token', 'api_token',
    ];
    
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

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
