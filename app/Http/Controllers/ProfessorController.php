<?php

namespace App\Http\Controllers;

use App\Professor;
use App\User;
use App\Career;
use App\Discipline;
use Illuminate\Http\Request;
use App\Http\Requests\ProfessorRequest;
use App\Http\Requests\ProfessorRequestEdit;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Exception;


class ProfessorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.Professor.index');
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
            return FileAdminDataController::validateFile($request,'document','xlsx','excel_files','FileAdminDataController@professor','/admin');
        } else {
            try {
                $this->validate($request, [
                    'name'=>'required',
                    'lastName'=>'required',
                    'numberProfessor'=>'required',
                    'email'=>'required',
                    'cardId'=>'required',
                    'studentCareer'=>'required'
                ]);
    
                $msg = '"'. $request->name .  ' ' . $request->lastName . '" - "' . $request->email . '" - "' . $request->numberProfessor . '"';
                $validateCareer = FileAdminDataController::validateCareers($request);
                $validateDiscipline = FileAdminDataController::validateDiscipline($request);
                
                if($validateCareer === true && $validateDiscipline === true){
                    $pass = Str::random(9);
                    $user = User::create([
                        'name' => $request->name .' '. $request->lastName,
                        'email' => $request->email,
                        'password' => Hash::make($pass),
                        'type_user_from_type_users' => 2,
                        'card_id' => $request->cardId
                    ]);

                    $professor = Professor::create([
                        'number_professor' => $request->numberProfessor,
                        'id_professor_from_users' => $user->id,
                        'acronym_career' => strtoupper($request->studentCareer),
                        'acronym_career_two' => strtoupper($request->studentCareerTwo),
                        'acronym_career_three' => strtoupper($request->studentCareerThree),
                        'professor_discipline' => strtoupper($request->professorDiscipline),
                        'professor_discipline_two' => strtoupper($request->professorDisciplineTwo),
                        'professor_discipline_three' => strtoupper($request->professorDisciplineThree)
                    ]);
                } else {
                    if($validateCareer !== true){
                        throw new Exception('Curso não existe');
                    } else if($validateDiscipline !== true){
                        throw new Exception('Disciplina não existe');
                    }
                }                   
            } catch (\Exception $e) {
                if(isset($user)){ $user->delete(); } 
                if(isset($professor)){ $professor->delete(); }
                if(!isset($msg)){ $msg = null; }
                return FileAdminDataController::reportError('/admin',$e,$msg);
            }
            return redirect('/admin')->with('successfully', 'Professor adicionado com sucesso ' . $pass);  
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Professor  $professor
     * @return \Illuminate\Http\Response
     */
    public function show(Professor $professor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Professor  $professor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $professor = Professor::findOrFail($id);
            $professor = User::join('professors', 'users.id', '=', 'professors.id_professor_from_users')->where('professors.id', '=', $id)->first();
        } catch (\Exception $e) {
            return FileAdminDataController::reportError('/admin/professor',$e);
        }
        return view('admin.Professor.edit.editProfessor', compact('professor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Professor  $professor
     * @return \Illuminate\Http\Response
     */
    public function update(ProfessorRequestEdit $request,$id)
    {
        try{
            $validateCareer = FileAdminDataController::validateCareers($request);
            $validateDiscipline = FileAdminDataController::validateDiscipline($request);
            
            if($validateCareer === true && $validateDiscipline === true){
                $professor = Professor::findOrFail($id);
                $user = User::where('id', '=', $professor->id_professor_from_users)->first();
        
                $user = User::where('id', '=', $professor->id_professor_from_users)->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'card_id' => $request->cardId
                ]);

                $professor = Professor::where('id', $id)->update([
                    'number_professor' => $request->numberProfessor,
                    'acronym_career' => strtoupper($request->studentCareer),
                    'acronym_career_two' => strtoupper($request->studentCareerTwo),
                    'acronym_career_three' => strtoupper($request->studentCareerThree),
                    'professor_discipline' => strtoupper($request->professorDiscipline),
                    'professor_discipline_two' => strtoupper($request->professorDisciplineTwo),
                    'professor_discipline_three' => strtoupper($request->professorDisciplineThree)
                ]);
            } else {
                if($validateCareer !== true){
                    throw new Exception('Curso não existe');
                } else if($validateDiscipline !== true){
                    throw new Exception('Disciplina não existe');
                }
            }
        } catch (\Exception $e) {
            return FileAdminDataController::reportError('/admin/professor',$e);
        }
        return redirect('/admin/professor')->with('successfully', 'Professor alterado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Professor  $professor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $professor = Professor::findOrFail($id);
            $user = User::where('id', '=', $professor->id_professor_from_users)->first();
            $professor->delete();
            $user->delete();
        } catch (\Exception $e) {
            return FileAdminDataController::reportError('/admin/professor',$e);
        }
        return redirect('/admin/professor')->with('successfully', 'Professor foi apagado com sucesso'); 
    }

    public function findProfessor(Request $request)
    {
        $professors = null;
        try {    
            if($request->numberProfessor){
                $professors = Professor::join('users', 'professors.id_professor_from_users', '=', 'users.id')->where('number_professor', '=', $request->numberProfessor)->select('professors.id','name')->get();
            } else if($request->email){
                $professors = User::join('professors', 'users.id', '=', 'professors.id_professor_from_users')->where('email', '=', $request->email)->select('professors.id','name')->get();
            } else if($request->cardId){
                $professors = User::join('professors', 'users.id', '=', 'professors.id_professor_from_users')->where('card_id', '=', $request->cardId)->select('professors.id','name')->get();
            } else if($request->name){
                $professors = User::join('professors', 'users.id', '=', 'professors.id_professor_from_users')->where('name', 'like', '%' . $request->name . '%')->select('professors.id','name')->get();
                if($request->name == '*'){
                    $professors = User::join('professors', 'users.id', '=', 'professors.id_professor_from_users')->select('professors.id','name')->get();
                }
            } else if($request->studentCareer){
                $professors = Professor::join('users', 'professors.id_professor_from_users', '=', 'users.id')->where('acronym_career', '=', $request->studentCareer)->select('professors.id','name')->get();
            } else {
                throw new Exception('Erro ao encontra o Professor');
            }
        } catch (\Exception $e) {
            return FileAdminDataController::reportError('/admin/professor',$e);
        }
        return view('admin.Professor.professorsList', compact('professors'));
    }
}
