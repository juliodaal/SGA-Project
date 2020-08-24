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
        'name', 'email','type_user_from_type_users','password','card_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
         'remember_token'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function typeUsers()
    {
        return $this->belongsTo('App\Type_user');
    }

    public function student()
    {
        return $this->hasOne('App\Student');
    }

    public function professor()
    {
        return $this->hasOne('App\Professor');
    }

    public function administrator()
    {
        return $this->hasOne('App\Administrator');
    }
}
