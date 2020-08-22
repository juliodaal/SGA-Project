<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EducationalPlan extends Model
{
    public function career()
    {
        return $this->belongsTo('App\Career');
    }
    public function discipline()
    {
        return $this->belongsTo('App\Discipline');
    }
}
