<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    protected $fillable = [
        'acronym_career','name'
    ];

    public function disciplines()
    {
        return $this->belongsToMany('App\Discipline');
    }
}
