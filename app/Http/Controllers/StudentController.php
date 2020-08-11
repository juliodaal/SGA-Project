<?php

namespace App\Http\Controllers;

use App\User;
use App\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.Student.index');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }
    /**
     * find a Student into the Database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function findStudent(Request $request)
    {
        // dd("hola");
        // $result = $request->StudentCareer->isEmpty();
        if($request->numberStudent){
            $student = App\Student::where('number_student', '=', $request->numberStudent)->get();
            $user = App\User::where('id', '=', $student->id_student_from_users)->get();
            dd($user);
            // return 
        }
        if($request->StudentCareer){
            dd('true');
        } else {
            dd('false');
        }
        // else if($request->StudentCareer->isEmptyString()){
        //     dd('Entro 2');
        // }
        // $hola = Student::get('acronym_career',$request->StudentCareer);
        // $test = App\Student::where('acronym_career', '=', "IT")->get();
        // $student = Student::findOrFail($request->StudentCareer);
        // dd($student);
    }
}
