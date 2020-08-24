<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    protected $fillable = [
        'number_professor',
        'id_professor_from_users',
        'acronym_career',
        'acronym_career_two',
        'acronym_career_three',
        'professor_discipline',
        'professor_discipline_two',
        'professor_discipline_three'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function program()
    {
        return $this->hasMany('App\Program');
    }
}
