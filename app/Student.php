<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'number_student','id_student_from_users','acronym_career'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
