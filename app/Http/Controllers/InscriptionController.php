<?php

namespace App\Http\Controllers;

use App\Inscription;
use App\User;
use App\Student;
use App\EducationalPlan;
use Illuminate\Http\Request;
use App\Http\Controllers\FileAdminDataController;
use Exception;

class InscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $student = User::join('students','users.id','=','students.id_student_from_users')
            ->where('email','=',session()->get('email'))
            ->select('number_student')
            ->first();
            $plans = [];
            $planOne = EducationalPlan::join('students', 'educational_plans.acronym_career_from_careers', '=', 'students.acronym_career') 
            ->join('disciplines','educational_plans.acronym_discipline_from_disciplines', '=','disciplines.acronym_discipline')
            ->where('number_student','=',$student->number_student)
            ->select('acronym_discipline_from_disciplines','acronym_career_from_careers','name')
            ->get();
            $planTwo = EducationalPlan::join('students', 'educational_plans.acronym_career_from_careers', '=', 'students.acronym_career_two')
            ->join('disciplines','educational_plans.acronym_discipline_from_disciplines', '=','disciplines.acronym_discipline')
            ->where('number_student','=',$student->number_student)
            ->select('acronym_discipline_from_disciplines','acronym_career_from_careers','name')
            ->get();
            $planThree = EducationalPlan::join('students', 'educational_plans.acronym_career_from_careers', '=', 'students.acronym_career_three')
            ->join('disciplines','educational_plans.acronym_discipline_from_disciplines', '=','disciplines.acronym_discipline')
            ->where('number_student','=',$student->number_student)
            ->select('acronym_discipline_from_disciplines','acronym_career_from_careers','name')
            ->get();
            foreach ($planOne as $planOnes){ array_push($plans,$planOnes); }   
            foreach ($planTwo as $planTwos) { array_push($plans,$planTwos); }
            foreach ($planThree as $planThrees) { array_push($plans,$planThrees);}
            $inscriptions = Inscription::where('number_student_from_students', '=', $student->number_student)->get();
            $x = true;
            $disciplines = [];
            foreach ($plans as $plan) {
                foreach ($inscriptions as $inscription) {
                    if($plan->acronym_discipline_from_disciplines == $inscription->acronym_discipline_from_disciplines){
                        $x = false;
                    }
                }
                if($x){ array_push($disciplines,['number_student' => $student->number_student,'discipline' => $plan->acronym_discipline_from_disciplines,'career'=>$plan->acronym_career_from_careers,'name'=>$plan->name ]); }
                $x = true;
            }
        } catch (\Exception $e) {
            return FileAdminDataController::reportError('/home',$e);
        }
        return view('admin.Inscription.index', compact('disciplines'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        try {
            $msg = '"' . $request['number_student'] . '"' . 'ou' . '"' . $request['discipline'] . '"' . 'ou' . '"' . $request['career'] . '"';
            Inscription::create([
                'number_student_from_students' => $request['number_student'],
                'acronym_discipline_from_disciplines' => $request['discipline'],
                'acronym_career_from_careers' => $request['career']
            ]);
        } catch (\Exception $e) {
            if(!isset($msg)){ $msg = null; }
            return FileAdminDataController::reportError('/home',$e,$msg);
        }
        return redirect('/home')->with('successfully', 'Disciplina adicionada com sucesso');  
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
     * @param  \App\Inscription  $inscription
     * @return \Illuminate\Http\Response
     */
    public function show(Inscription $inscription)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Inscription  $inscription
     * @return \Illuminate\Http\Response
     */
    public function edit(Inscription $inscription)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Inscription  $inscription
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inscription $inscription)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Inscription  $inscription
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inscription $inscription)
    {
        //
    }
}
