<?php

namespace App\Http\Controllers;

use App\Program;
use App\Career;
use App\Discipline;
use App\Professor;
use App\Student;
use Illuminate\Http\Request;
use App\Http\Requests\ProgramRequest;

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
    public function create(ProgramRequest $request)
    {
        try {
            $career = Career::where('acronym_career', '=', $request->acronymCareer)->first();
            $discipline = Discipline::where('acronym_discipline', '=', $request->acronymDiscipline)->first();
            $professor = Professor::where('number_professor', '=', $request->numberProfessor)->first();
            $student = Student::where('group', '=', $request->groupStudents)->first();
            $careerProfessor = Professor::where('acronym_career', '=', $request->acronymCareer)->where('number_professor', '=', $request->numberProfessor)->first();
            $careerProfessorTwo = Professor::where('acronym_career_two', '=', $request->acronymCareer)->where('number_professor', '=', $request->numberProfessor)->first();
            $careerProfessorThree = Professor::where('acronym_career_three', '=', $request->acronymCareer)->where('number_professor', '=', $request->numberProfessor)->first();
            $disciplineProfessor = Professor::where('professor_discipline', '=', $request->acronymDiscipline)->where('number_professor', '=', $request->numberProfessor)->first();
            $disciplineProfessorTwo = Professor::where('professor_discipline_two', '=', $request->acronymDiscipline)->where('number_professor', '=', $request->numberProfessor)->first();
            $disciplineProfessorThree = Professor::where('professor_discipline_three', '=', $request->acronymDiscipline)->where('number_professor', '=', $request->numberProfessor)->first();
            $validateHourProgram = Program::where('date_to_class', '=',$request->date)
                ->where('start_class', '>=',$request->startTime)
                ->where('start_class', '<=',$request->endTime)
                ->where('end_class', '>=',$request->startTime)
                ->where('end_class', '<=',$request->endTime)
                ->where('number_professor', '>=',$request->numberProfessor)->first();

            $program = new Program;
            if(!is_null($career)){
                if(!is_null($discipline)){
                    if(!is_null($professor)){
                        if(!is_null($student)){
                            if(!is_null($careerProfessor) || !is_null($careerProfessorTwo) || !is_null($careerProfessorThree)){
                                if(!is_null($disciplineProfessor) || !is_null($disciplineProfessorTwo) || !is_null($disciplineProfessorThree)){
                                    if(is_null($validateHourProgram)){
                                        $program->acronym_career = strtoupper($request->acronymCareer);
                                        $program->acronym_discipline = strtoupper($request->acronymDiscipline);
                                        $program->number_professor = $request->numberProfessor;
                                        $program->date_to_class = $request->date;
                                        $program->start_class = $request->startTime;
                                        $program->end_class = $request->endTime;
                                        $program->classroom_number = $request->classRoom;
                                        $program->group_from_students = $request->groupStudents;
                                        $program->save();
                                    } else {
                                        return view('admin.index', [
                                            'error' => 'Erro: Professor já esta associado a um Programa o dia ' . $request->date . ' Comenco Aula ' . $request->startTime . ' Fim Aula ' . $request->endTime
                                        ]);
                                    }
                                } else {
                                    return view('admin.index', [
                                        'error' => 'Disciplina não Associada ao Professor'
                                    ]);
                                }
                            } else {
                                return view('admin.index', [
                                    'error' => 'Curso não Associado ao Professor'
                                ]);
                            } 
                        } else {
                            return view('admin.index', [
                                'error' => 'Grupo de Estudantes ' . $request->groupStudent . ' não existe'
                            ]);
                        }
                    } else {
                        return view('admin.index', [
                            'error' => 'Numero de Professor ' . strtoupper($request->numberProfessor) . ' não existe'
                        ]);  
                    }
                } else {
                    return view('admin.index', [
                        'error' => 'Disciplina ' . strtoupper($request->acronymDiscipline) . ' não existe'
                    ]);    
                }
            } else {
                return view('admin.index', [
                    'error' => 'Curso ' . strtoupper($request->acronymCareer) . ' não existe'
                ]);
            }

        } catch (\Exception $e) {
            if (strpos($e, 'Duplicate') !== false) {
                return view('admin.index', [
                    'error' => 'Este Programa já existe'
                ]);
            } if(strpos($e, 'Unknown database') !== false) {
                return view('admin.index', [
                    'error' => 'Erro na ligação à base de dados'
                ]);
            } else {
                return view('admin.index', [
                    'error' => $e
                ]);
            }
        }
        return view('admin.index', [
            'successfully' => 'Programa adicionado com sucesso '
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $program = Program::findOrFail($id);
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
            $program->acronym_career = strtoupper($request->acronym);
            $program->acronym_discipline = strtoupper($request->acronymDiscipline);
            $program->number_professor = $request->numberProfessor;
            $program->date_to_class = $request->date;
            $program->start_class = $request->startClass;
            $program->end_class = $request->endClass;
            $program->classroom_number = $request->classroomNumber;
            $program->save();
        
            } catch (\Exception $e) {
                if(strpos($e, 'Unknown database') !== false) {
                    return view('admin.Program.edit.editProgram', [
                        'error' => 'Erro na ligação à base de dados'
                    ]);
                } else {
                    return view('admin.Program.edit.editProgram', [
                        'error' => $e,
                        'program' => $program
                    ]);
                }
            }
            return view('admin.Program.edit.editProgram', [
                'successfully' => 'Programa alterado com sucesso',
                'program' => $program
                ]);
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
            $program = Program::findOrFail($id);
            $program->delete();
            
        } catch (\Exception $e) {
            if(strpos($e, 'Unknown database') !== false) {
                return view('admin.Program.index', [
                    'error' => 'Erro na ligação à base de dados'
                ]);
            } else {
                return view('admin.Program.index', [
                    'error' => 'Erro ao apagar o Programa',
                ]);
            }
        }

        return view('admin.Program.index', [
            'successfully' => 'Programa foi apagado com sucesso',
        ]);
    }
    
    public function findProgram(Request $request)
    {
        $programs = null;
        try {    
            if($request->acronym){
                $programs = Program::where('acronym_career', '=', $request->acronym)->get();
            } 
        } catch (\Exception $e) {
            return view('admin.Program.index', [
                'error' => 'Erro ao encontra o Professor'
            ]);
        }
        return view('admin.Program.programsList', compact('programs'));
    }
}
