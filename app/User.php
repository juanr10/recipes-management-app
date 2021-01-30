<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'url'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();

        //Assign a profile when a user is created
        static::created(function ($user) {
            $user->profile()->create();
        });
    }

    /** Relation 1:n to Recipes*/
    public function recipes()
    {
        return $this->hasMany(Recipe::class);
    }

    /** Relation 1:1 to Profiles*/
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }
}
