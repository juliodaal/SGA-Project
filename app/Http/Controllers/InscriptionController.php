<?php

namespace App\Http\Controllers;

use App\Inscription;
use App\User;
use App\Student;
use App\EducationalPlan;
use Illuminate\Http\Request;

class InscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student = User::join('students','users.id','=','students.id_student_from_users')
        ->where('email','=',session()->get('email'))
        ->select('number_student')
        ->first();
        $plans = EducationalPlan::join('students', 'educational_plans.acronym_career_from_careers', '=', 'students.acronym_career') 
        ->where('number_student','=',$student->number_student)
        ->select('acronym_discipline_from_disciplines')
        ->get();
        $inscriptions = Inscription::where('number_student_from_students', '=', $student->number_student)->get();
        $x = true;
        $disciplines = [];
        foreach ($plans as $plan) {
            foreach ($inscriptions as $inscription) {
                if($plan->acronym_discipline_from_disciplines == $inscription->acronym_discipline_from_disciplines){
                    $x = false;
                }
            }
            if($x){
                array_push($disciplines,[
                    'number_student' => $student->number_student,
                    'discipline' => $plan->acronym_discipline_from_disciplines
                    ]);
            }
            $x = true;
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

            $inscription = new Inscription;

            $inscription->number_student_from_students = $request['number_student'];
            $inscription->acronym_discipline_from_disciplines = $request['discipline'];

            $inscription->save();

        } catch (\Exception $e) {
            if (strpos($e, 'Duplicate') !== false) {
                return view('admin.Inscription.index', [
                    'error' => 'Esta Inscrição já existe'
                ]);
            } else if(strpos($e, 'Unknown database') !== false) {
                return view('admin.Inscription.index', [
                    'error' => 'Erro na ligação à base de dados'
                ]);
            } else {
                return view('admin.Inscription.index', [
                    'error' => $e
                ]);
            }
        }
        return $this->index();
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
