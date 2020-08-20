<?php

namespace App\Http\Controllers;

use App\Program;
use App\Career;
use App\Discipline;
use App\Professor;
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


            $program = new Program;
            if(!is_null($career)){
                if(!is_null($discipline)){
                    if(!is_null($professor)){
                        $program->acronym_career = strtoupper($request->acronymCareer);
                        $program->acronym_discipline = strtoupper($request->acronymDiscipline);
                        $program->number_professor = $request->numberProfessor;
                        $program->date_to_class = $request->date;
                        $program->start_class = $request->startTime;
                        $program->end_class = $request->endTime;
                        $program->classroom_number = $request->classRoom;
                        $program->save();
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
