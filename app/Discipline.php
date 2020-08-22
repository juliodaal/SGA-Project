<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discipline extends Model
{
    protected $fillable = [
        'acronym_discipline','name'
    ];
    public function careers()
    {
        return $this->belongsToMany('App\Career');
    }
    public function educationalPlan()
    {
        return $this->hasMany('App\EducationalPlan');
    }
    public function inscription()
    {
        return $this->hasMany('App\Inscription');
    }
}
