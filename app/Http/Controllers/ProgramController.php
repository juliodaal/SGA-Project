<?php

namespace App\Http\Controllers;

use App\Program;
use App\Career;
use App\Discipline;
use App\Professor;
use App\Student;
use Illuminate\Http\Request;
use App\Http\Requests\ProgramRequest;
use App\Http\Controllers\FileAdminDataController;
use Exception;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.Program.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!is_null($request->document)){
            return FileAdminDataController::validateFile($request,'document','xlsx','excel_files','FileAdminDataController@program','/admin');
        } else {
            try {
                $this->validate($request, [
                    'acronymCareer'=>'required',
                    'acronymDiscipline'=>'required',
                    'numberProfessor'=>'required',
                    'date'=>'required',
                    'startTime'=>'required',
                    'endTime'=>'required',
                    'classRoom'=>'required',
                    'groupStudents'=>'required'
                ]);

                $msg = '"'. $request->name .  ' ' . $request->lastName . '" - "' . $request->email . '" - "' . $request->numberProfessor . '"';
                $validateProgram = FileAdminDataController::validateProgram($request);
                if($validateProgram === true){
                    Program::create([
                        'acronym_career' => strtoupper($request->acronymCareer),
                        'acronym_discipline' => strtoupper($request->acronymDiscipline),
                        'number_professor' => $request->numberProfessor,
                        'date_to_class' => $request->date,
                        'start_class' => $request->startTime,
                        'end_class' => $request->endTime,
                        'classroom_number' => $request->classRoom,
                        'group_from_students' => $request->groupStudents
                    ]);
                } else {
                    throw new Exception($validateProgram);
                }
            } catch (\Exception $e) {
                if(!isset($msg)){ $msg = null; }
                return FileAdminDataController::reportError('/admin',$e,$msg);
            }
            return redirect('/admin')->with('successfully', 'Programa adicionado com sucesso ');  
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function show(Program $program)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $program = Program::findOrFail($id);
        } catch (\Exception $e) {
            return FileAdminDataController::reportError('/admin/program',$e);
        }
        return view('admin.Program.edit.editProgram', compact('program'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function update(ProgramRequest $request,$id)
    {
        try{
            $program = Program::findOrFail($id);
            $validateProgram = FileAdminDataController::validateProgram($request);
            if($validateProgram === true){
                $program::where('id', $id)->update([
                    'acronym_career' => strtoupper($request->acronymCareer),
                    'acronym_discipline' => strtoupper($request->acronymDiscipline),
                    'number_professor' => $request->numberProfessor,
                    'date_to_class' => $request->date,
                    'start_class' => $request->startTime,
                    'end_class' => $request->endTime,
                    'classroom_number' => $request->classRoom,
                    'group_from_students' => $request->groupStudents
                ]);
            } else {
                throw new Exception('Verifique os dados inseridos, não foi possível modificar este programa');
            }
            } catch (\Exception $e) {
                return FileAdminDataController::reportError('/admin/program',$e);
            }
            return redirect('/admin/program')->with('successfully', 'Programa alterado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $program = Program::findOrFail($id)->delete();
        } catch (\Exception $e) {
            return FileAdminDataController::reportError('/admin/program',$e);
        }
        return redirect('/admin/program')->with('successfully', 'Programa foi apagado com sucesso'); 
    }
    
    public function findProgram(Request $request)
    {
        $programs = null;
        try {    
            if($request->acronym){
                $programs = Program::join('professors','programs.number_professor','=','professors.number_professor')
                ->join('users','users.id','=','professors.id_professor_from_users')
                ->where('programs.acronym_career', '=', $request->acronym)
                ->select(
                    'programs.id',
                    'programs.acronym_career',
                    'programs.acronym_discipline',
                    'date_to_class',
                    'start_class',
                    'end_class',
                    'classroom_number',
                    'group_from_students',
                    'name'
                    )
                ->get();
            }  else {
                throw new Exception('Erro ao encontra o Programa');
            }
        } catch (\Exception $e) {
            return FileAdminDataController::reportError('/admin/program',$e);

        }
        return view('admin.Program.programsList', compact('programs'));
    }
}
