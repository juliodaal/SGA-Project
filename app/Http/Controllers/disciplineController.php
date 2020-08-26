<?php

namespace App\Http\Controllers;

use App\Discipline;
use Illuminate\Http\Request;
use App\Http\Controllers\FileAdminDataController;
use App\Http\Requests\CreateDisciplinesRequest;

class disciplineController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $disciplines = Discipline::orderBy('acronym_discipline')->get();
        } catch (\Exception $e) {
            return FileAdminDataController::reportError('/admin',$e);
        }
        return view('admin.Discipline.index', compact('disciplines'));
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
            return FileAdminDataController::validateFile($request,'document','xlsx','excel_files','FileAdminDataController@discipline','/admin');
        } else {
            $this->validate($request, ['acronym'=>'required','name'=>'required']);
            try {
                $msg = '"'. $request->acronym . '" ou "' . $request->name . '"';
                Discipline::create([
                    'acronym_discipline'=>strtoupper($request->acronym),
                    'name'=>$request->name
                ]);
            } catch (\Exception $e) {
                if(!isset($msg)){ $msg = null; }
                return FileAdminDataController::reportError('/admin',$e,$msg);
            }
            return redirect('/admin')->with('successfully', 'Disciplina adicionada com sucesso');  
        }
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
        try {
        $discipline = Discipline::findOrFail($id);
        } catch (\Exception $e) {
            return FileAdminDataController::reportError('/admin/discipline',$e);
        }
        return view('admin.Discipline.edit.editDiscipline', compact('discipline'));
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
        $discipline::where('id', $id)->update([
            'acronym_discipline' => strtoupper($request->acronym),
            'name' => $request->name
        ]);
        } catch (\Exception $e) {
            return FileAdminDataController::reportError('/admin/discipline/' . $id . '/edit',$e);
        }
        return redirect('/admin/discipline')->with('successfully', 'Disciplinas alterada com sucesso'); 
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
            Discipline::findOrFail($id)->delete();
        } catch (\Exception $e) {
            return FileAdminDataController::reportError('/admin/discipline/' . $id . '/edit',$e);
        }
        return redirect('/admin/discipline')->with('successfully', 'Disciplinas apagada com sucesso'); 
    }
}
