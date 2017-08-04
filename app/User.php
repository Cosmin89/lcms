<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Cache;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    
    protected $fillable = [
        'username', 'first_name', 'last_name', 'email', 'password', 'user_image'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles()
    {
        return $this->belongsToMany('App\Role')->withTimestamps();
    }

    public function authorizeRoles($roles)
    {
        if($this->hasAnyRole($roles)) {
            return true;
        }
    }

    public function hasAnyRole($roles)
    {
        if(is_array($roles)) {
            foreach($roles as $role) {
                if($this->hasRole($role)) {
                    return true;
                }
            }
        } else {
            if($this->hasRole($roles)) {
                return true;
            }
        }

        return false;
    }

    public function hasRole($role) {
        if($this->roles()->where('name', $role)->first()) {
            return true;
        }

        return false;
    }

    public function isOnline()
    {
        return Cache::has('user-is-online-' . $this->id);
    }

    public function getRouteKeyName()
    {
        return 'username';
    }



}
