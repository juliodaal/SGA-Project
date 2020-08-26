<?php

namespace App\Http\Controllers;

use App\Career;
use App\Student;
use App\Professor;
use App\Program;
use Illuminate\Http\Request;
use App\Http\Requests\CareerRequest;
use App\Http\Controllers\FileAdminDataController;

class CareerController extends Controller
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
            $careers = Career::orderBy('acronym_career')->get();
        } catch (\Exception $e) {
            return FileAdminDataController::reportError('/admin',$e);
        }
        return view('admin.Career.index', compact('careers'));
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
            return FileAdminDataController::validateFile($request,'document','xlsx','excel_files','FileAdminDataController@career','/admin');
        } else {
            try {
                $this->validate($request, ['acronym'=>'required','name'=>'required']);
                $msg = '"'. strtoupper($request->acronym) . '" ou "' . $request->name . '"';
                Career::create([
                    'acronym_career'=>strtoupper($request->acronym),
                    'name'=>$request->name
                ]);
            } catch (\Exception $e) {
                if(!isset($msg)){ $msg = null; }
                return FileAdminDataController::reportError('/admin',$e,$msg);
            }
            return redirect('/admin')->with('successfully', 'Curso adicionado com sucesso');  
        }
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
            return FileAdminDataController::reportError('/admin/career',$e);
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
                $career::where('id', $id)->update([
                    'acronym_career' => strtoupper($request->acronym),
                    'name' => $request->name
                ]);
                $this->updateData($students,'acronym_career',strtoupper($request->acronym));
                $this->updateData($professors,'acronym_career',strtoupper($request->acronym));
                $this->updateData($programs,'acronym_career',strtoupper($request->acronym));
        
            } catch (\Exception $e) {
                return FileAdminDataController::reportError('/admin/career/' . $id . '/edit',$e);
            }
            return redirect('/admin/career')->with('successfully', 'Curso alterado com sucesso'); 
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
            Career::findOrFail($id)->delete();
        } catch (\Exception $e) {
            return FileAdminDataController::reportError('/admin/career/' . $id . '/edit',$e);
        }
        return redirect('/admin/career')->with('successfully', 'Curso apagado com sucesso'); 
    }

    public function updateData($listDatas,$column,$attr){
        foreach ($listDatas as $listData) {
            $listData->column = attr;
            $listData->save();
        }
    }
}
