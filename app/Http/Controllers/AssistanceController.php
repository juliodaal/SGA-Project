<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\FileAdminDataController;
use App\Assistance;
use Exception;


class AssistanceController extends Controller
{
    public function assistance(){
        try {
            $numberStudent = 412541254;
            $classRoom = 'f369';
            $entry = 0;
            $date = '2020-08-25';
            $startTime = '00:00:00'; //
            $endTime = '18:10:00'; //'18:59:00'
            // $acronymCareer = 'ti';
            // $acronymDiscipline = 'FPOO';
            // $group_sudents = 1;

            Assistance::create([
                'number_student' => $numberStudent,
                'classroom' => $classRoom,
                'entry' => $entry,
                'date_to_class' => $date,
                'startTime' => $startTime,
                'endtime' => $endTime,
                // 'acronym_career' => $acronymCareer,
                // 'acronym_discipline' => $acronymDiscipline,
                // 'group_sudents' => $group_sudents
            ]);
        } catch (\Exception $e) {
            dd($e);
            return FileAdminDataController::reportError('/home',$e);
        }
        return redirect('/home');
    }
}
