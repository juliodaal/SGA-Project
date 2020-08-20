<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Administrator extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
