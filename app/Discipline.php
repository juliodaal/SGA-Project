<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discipline extends Model
{
    public function careers()
    {
        return $this->belongsToMany('App\Career');
    }
}
