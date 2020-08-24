<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inscription extends Model
{
    protected $fillable = [
        'number_student_from_students','acronym_discipline_from_disciplines','acronym_career_from_careers'
    ];
    public function student()
    {
        return $this->belongsTo('App\Student');
    }
    public function discipline()
    {
        return $this->belongsTo('App\Discipline');
    }
}
