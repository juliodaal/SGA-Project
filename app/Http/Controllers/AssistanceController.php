<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\FileAdminDataController;
use App\Assistance;
use Exception;


class AssistanceController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function assistance(){
        try {
            $numberStudent = 234567891;
            $classRoom = 'E135';
            $entry = 0;
            $date = '2020-09-02';
            $startTime = '00:00:00';
            $endTime = '09:24:00'; 

            Assistance::create([
                'number_student' => $numberStudent,
                'classroom' => $classRoom,
                'entry' => $entry,
                'date_to_class' => $date,
                'startTime' => $startTime,
                'endtime' => $endTime
            ]);
        } catch (\Exception $e) {
            return FileAdminDataController::reportError('/home',$e);
        }
        return redirect('/home');
    }
}
