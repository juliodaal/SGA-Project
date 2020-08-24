<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EducationalPlan extends Model
{
    protected $fillable = [
        'acronym_career_from_careers','acronym_discipline_from_disciplines','semester'
    ];

    public function career()
    {
        return $this->belongsTo('App\Career');
    }
    public function discipline()
    {
        return $this->belongsTo('App\Discipline');
    }
}
