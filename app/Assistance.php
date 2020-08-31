<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assistance extends Model
{
    protected $fillable = [
        'number_student','classroom','entry','date_to_class','startTime','endtime'
    ];
}
