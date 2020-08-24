<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'number_student','id_student_from_users','acronym_career','acronym_career_two','acronym_career_three','group'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function program()
    {
        return $this->hasMany('App\Program');
    }
    public function inscription()
    {
        return $this->hasMany('App\Inscription');
    }
}
