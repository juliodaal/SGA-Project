<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type_user extends Model
{
    protected $fillable = [
        'type', 'name'
    ];

    public function users()
    {
        return $this->hasMany('App\User');
    }
}
