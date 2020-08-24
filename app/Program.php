<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $fillable = [
        'acronym_career','acronym_discipline','number_professor','date_to_class','start_class','end_class','classroom_number','group_from_students'
    ];
    
    public function professor()
    {
        return $this->belongsTo('App\Professor');
    }
    public function student()
    {
        return $this->belongsTo('App\Student');
    }
}
