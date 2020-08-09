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

        return view('admin.editDiscipline.index', compact('disciplines'));
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
            $discipline->acronym_discipline = "$request->acronym";
            $discipline->name = "$request->name";
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
        $id = $discipline->id;
        $acronym = $discipline->acronym_discipline;
        $name = $discipline->name;
        return view('admin.editDiscipline.edit.editDiscipline', [
            'acronym' => $acronym,
            'name' => $name,
            'id' => $id
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        dd($id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
