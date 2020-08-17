<?php

namespace App\Http\Controllers;

use App\Professor;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\ProfessorRequest;
use App\Http\Requests\ProfessorRequestEdit;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


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
    public function create(ProfessorRequest $request)
    {
        try {

            $user = new User;

            $user->name = $request->name .' '. $request->lastName;
            $user->email = $request->email;
            $pass = Str::random(9);
            $user->password = Hash::make($pass);
            $user->type_user_from_type_users = 2;
            $user->card_id = $request->cardId;
            
            $user->save();
            $professor = new Professor;
            
            $professor->number_professor = $request->numberProfessor;
            $professor->id_professor_from_users = $user->id;
            $professor->acronym_career = $request->professorCareer;
            $professor->acronym_career_two = $request->professorCareerTwo;
            $professor->acronym_career_three = $request->professorCareerThree;
            
            $professor->save();

        } catch (\Exception $e) {
            if (strpos($e, 'Duplicate') !== false) {
                return view('admin.index', [
                    'error' => 'Este Professor já existe'
                ]);
            } else {
                return view('admin.index', [
                    'error' => $e
                ]);
            }
        }
        return view('admin.index', [
            'successfully' => 'Professor adicionado com sucesso ' . $pass,
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
        $user = User::findOrFail($id);
        $professor = User::join('professors', 'users.id', '=', 'professors.id_professor_from_users')->where('users.id', '=', $user->id)->first();
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

            $professor = Professor::findOrFail($id);
            $user = User::where('id', '=', $professor->id_professor_from_users)->first();
    
            
            $user->name = $request->name;
            $professor->number_professor = $request->numberProfessor;
            $user->email = $request->email;
            $user->card_id = $request->cardId;
            $professor->acronym_career = $request->professorCareer;
            $professor->acronym_career_two = $request->professorCareerTwo;
            $professor->acronym_career_three = $request->professorCareerThree;
            $professor->save();
            $user->save();
        
            } catch (\Exception $e) {
                return view('admin.Professor.edit.editProfessor', [
                    'error' => 'Erro ao alterar o Professor',
                    'professor' => $professor = User::join('professors', 'users.id', '=', 'professors.id_professor_from_users')->where('professors.id', '=', $id)->first()
                ]);
            }
            return view('admin.Professor.edit.editProfessor', [
                'successfully' => 'Professor alterado com sucesso',
                'professor' => $professor = User::join('professors', 'users.id', '=', 'professors.id_professor_from_users')->where('professors.id', '=', $id)->first()
            ]);
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
            return view('admin.Professor.index', [
                'error' => 'Erro ao apagar ao Professor',
                'professor' => $professor = User::join('professors', 'users.id', '=', 'professors.id_professor_from_users')->where('professors.id', '=', $id)->first()
            ]);
        }

        return view('admin.Professor.index', [
            'successfully' => 'Professor foi apagado com sucesso',
            'professor' => $professor = User::join('professors', 'users.id', '=', 'professors.id_professor_from_users')->where('professors.id', '=', $id)->first()
        ]);
    }
    public function findProfessor(Request $request)
    {
        $professors = null;
        try {    
            if($request->numberProfessor){
                $professors = Professor::join('users', 'professors.id_professor_from_users', '=', 'users.id')->where('number_professor', '=', $request->numberProfessor)->get();
            } else if($request->email){
                $professors = User::join('professors', 'users.id', '=', 'professors.id_professor_from_users')->where('email', '=', $request->email)->get();
            } else if($request->cardId){
                $professors = User::join('professors', 'users.id', '=', 'professors.id_professor_from_users')->where('card_id', '=', $request->cardId)->get();
            } else if($request->name){
                $professors = User::join('professors', 'users.id', '=', 'professors.id_professor_from_users')->where('name', 'like', '%' . $request->name . '%')->get();
            } else if($request->professorCareer){
                $professors = Professor::join('users', 'professors.id_professor_from_users', '=', 'users.id')->where('acronym_career', '=', $request->professorCareer)->get();
            } 
        } catch (\Exception $e) {
            return view('admin.Professor.index', [
                'error' => 'Erro ao encontra o Professor'
            ]);
        }
        if($professors){
            foreach ($professors as $professor) {        
                $professor->password = 'No access';
            }
        } else {
            return view('admin.Professor.index', [
                'error' => 'Erro ao encontra o Professor'
            ]);
        }
        return view('admin.Professor.professorsList', compact('professors'));
    }
}
