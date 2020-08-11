<?php

namespace App\Http\Controllers;

use App\Discipline;
use Illuminate\Http\Request;
use App\Http\Requests\CreateDisciplinesRequest;

class disciplineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $disciplines = Discipline::all();

        return view('admin.discipline.editDiscipline.index', compact('disciplines'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CreateDisciplinesRequest $request)
    {
        try {

            $discipline = new Discipline;
            $discipline->acronym_discipline = $request->acronym;
            $discipline->name = $request->name;
            $discipline->save();

        } catch (\Exception $e) {
            if (strpos($e, 'Duplicate') !== false) {
                return view('admin.index', [
                    'error' => 'Esta disciplina já existe'
                ]);
            }
        }
        return view('admin.index', [
            'successfully' => 'Disciplina adicionada com sucesso'
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $discipline = Discipline::findOrFail($id);
        return view('admin.discipline.editDiscipline.edit.editDiscipline', compact('discipline'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateDisciplinesRequest $request,$id)
    {   
        try{

        $discipline = Discipline::findOrFail($id);
        $discipline->acronym_discipline = $request->acronym;
        $discipline->name = $request->name;
        $discipline->save();

        } catch (\Exception $e) {
            return view('admin.discipline.editDiscipline.index', [
                'error' => 'Erro ao alterar a disciplina',
                'disciplines' => $disciplines = Discipline::all()
            ]);
        }
        return view('admin.discipline.editDiscipline.index', [
            'successfully' => 'Disciplina alterada com sucesso',
            'disciplines' => $disciplines = Discipline::all()
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            
            $discipline = Discipline::findOrFail($id);
            $discipline->delete();
            
        } catch (\Exception $e) {
            return view('admin.discipline.editDiscipline.index', [
                'error' => 'Erro ao apagar a disciplina',
                'disciplines' => $disciplines = Discipline::all()
            ]);
        }

        return view('admin.discipline.editDiscipline.index', [
            'successfully' => 'Disciplina apagada com sucesso',
            'disciplines' => $disciplines = Discipline::all()
        ]);
    }
}
