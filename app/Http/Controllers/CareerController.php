<?php

namespace App\Http\Controllers;

use App\Career;
use App\Student;
use App\Professor;
use App\Program;
use Illuminate\Http\Request;
use App\Http\Requests\CareerRequest;

class CareerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $careers = Career::all();
        } catch (\Exception $e) {
            if(strpos($e, 'Unknown database') !== false) {
                return view('admin.index', [
                    'error' => 'Erro na ligação à base de dados'
                ]);
            }
        }

        return view('admin.Career.index', compact('careers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CareerRequest $request)
    {
        try {

            $career = new Career;
            $career->acronym_career = strtoupper($request->acronym) ;
            $career->name = $request->name;
            $career->save();

        } catch (\Exception $e) {
            if (strpos($e, 'Duplicate') !== false) {
                return view('admin.index', [
                    'error' => 'Este curso já existe'
                ]);
            } else if(strpos($e, 'Unknown database') !== false) {
                return view('admin.index', [
                    'error' => 'Erro na ligação à base de dados'
                ]);
            }
        }
        return view('admin.index', [
            'successfully' => 'Curso adicionado com sucesso'
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
     * @param  \App\Career  $career
     * @return \Illuminate\Http\Response
     */
    public function show(Career $career)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Career  $career
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $career = Career::findOrFail($id);
        } catch (\Exception $e) {
            if(strpos($e, 'Unknown database') !== false) {
                return view('admin.Career.index', [
                    'error' => 'Erro na ligação à base de dados'
                ]);
            }
        }
        return view('admin.Career.edit.editCareer', compact('career'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Career  $career
     * @return \Illuminate\Http\Response
     */
    public function update(CareerRequest $request,$id)
    {
            try{

            $career = Career::findOrFail($id);
            $students = Student::where('acronym_career', '=', $career->acronym_career)->get();
            $professors = Professor::where('acronym_career', '=', $career->acronym_career)->get();
            $programs = Program::where('acronym_career', '=', $career->acronym_career)->get();
            $career->acronym_career = strtoupper($request->acronym);
            $career->name = $request->name;
            $career->save();
            foreach ($students as $student) {
                $student->acronym_career = strtoupper($request->acronym);
                $student->save();
            }
            foreach ($professors as $professor) {
                $professor->acronym_career = strtoupper($request->acronym);
                $professor->save();
            }
            foreach ($programs as $program) {
                $program->acronym_career = strtoupper($request->acronym);
                $program->save();
            }
    
            } catch (\Exception $e) {
                if(strpos($e, 'Unknown database') !== false) {
                    return view('admin.Career.edit.editCareer', [
                        'error' => 'Erro na ligação à base de dados'
                    ]);
                } else {
                    return view('admin.Career.edit.editCareer', [
                        'error' => 'Erro ao alterar o Curso',
                        'career' => Career::findOrFail($id)
                    ]);
                }
            }
            return view('admin.Career.index', [
                'successfully' => 'Curso alterado com sucesso',
                'careers' => Career::all()
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Career  $career
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            
            $career = Career::findOrFail($id);
            $career->delete();
            
        } catch (\Exception $e) {
            if(strpos($e, 'Unknown database') !== false) {
                return view('admin.Career.edit.index', [
                    'error' => 'Erro na ligação à base de dados'
                ]);
            } else {
                return view('admin.Career.edit.index', [
                    'error' => 'Erro ao apagar o Curso',
                    'career' => Career::findOrFail($id)
                ]);
            }
        }

        return view('admin.Career.index', [
            'successfully' => 'Curso apagado com sucesso',
            'careers' => Career::all()
        ]);
    }
}
