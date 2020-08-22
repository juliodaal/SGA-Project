<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inscription extends Model
{
    public function student()
    {
        return $this->belongsTo('App\Student');
    }
    public function discipline()
    {
        return $this->belongsTo('App\Discipline');
    }
}
