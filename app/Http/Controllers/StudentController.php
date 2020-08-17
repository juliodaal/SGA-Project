<?php

namespace App\Http\Controllers;

use App\User;
use App\Student;
use Illuminate\Http\Request;
use App\Http\Requests\StudentsRequest;
use App\Http\Requests\StudentsRequestEdit;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
    public function create(StudentsRequest $request)
    {
        try {

            $user = new User;

            $user->name = $request->name .' '. $request->lastName;
            $user->email = $request->email;
            $pass = Str::random(9);
            $user->password = Hash::make($pass);
            $user->type_user_from_type_users = 1;
            $user->card_id = $request->cardId;
            
            $user->save();
            $student = new Student;
            
            $student->number_student = $request->numberStudent;
            $student->id_student_from_users = $user->id;
            $student->acronym_career = $request->studentCareer;
            $student->acronym_career_two = $request->studentCareerTwo;
            $student->acronym_career_three = $request->studentCareerThree;
            
            $student->save();

        } catch (\Exception $e) {
            if($user){
                $user->delete();
            } if($student){
                $student->delete();
            } 
            if (strpos($e, 'Duplicate') !== false) {
                return view('admin.index', [
                    'error' => 'Este estudante já existe'
                ]);
            } else {
                return view('admin.index', [
                    'error' => $e
                ]);
            }
        }
        return view('admin.index', [
            'successfully' => 'Estudante adicionada com sucesso ' . $pass,
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
        $student = User::join('students', 'users.id', '=', 'students.id_student_from_users')->where('students.id', '=', $student->id)->first();
        return view('admin.Student.edit.editStudent', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(StudentsRequestEdit $request,$id)
    {
        try{

        $student = Student::findOrFail($id);
        $user = User::where('id', '=', $student->id_student_from_users)->first();

        
        $user->name = $request->name;
        $student->number_student = $request->numberStudent;
        $user->email = $request->email;
        $user->card_id = $request->cardId;
        $student->acronym_career = $request->studentCareer;
        $student->acronym_career_two = $request->studentCareerTwo;
        $student->acronym_career_three = $request->studentCareerThree;
        $student->save();
        $user->save();
    
        } catch (\Exception $e) {
            return view('admin.Student.edit.editStudent', [
                'error' => 'Erro ao alterar o Estudante',
                'student' => $student = User::join('students', 'users.id', '=', 'students.id_student_from_users')->where('students.id', '=', $id)->first()
            ]);
        }
        return view('admin.Student.edit.editStudent', [
            'successfully' => 'Estudante alterado com sucesso',
            'student' => $student = User::join('students', 'users.id', '=', 'students.id_student_from_users')->where('students.id', '=', $id)->first()
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $student = Student::findOrFail($id);
            $user = User::where('id', '=', $student->id_student_from_users)->first();
            $student->delete();
            $user->delete();
            
        } catch (\Exception $e) {
            return view('admin.Student.index', [
                'error' => 'Erro ao apagar a Estudante',
                'student' => $student = User::join('students', 'users.id', '=', 'students.id_student_from_users')->where('students.id', '=', $id)->first()
            ]);
        }

        return view('admin.Student.index', [
            'successfully' => 'Estudante foi apagado com sucesso',
            'student' => $student = User::join('students', 'users.id', '=', 'students.id_student_from_users')->where('students.id', '=', $id)->first()
        ]);
    }
    /**
     * find a Student into the Database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function findStudent(Request $request)
    {
        $students = null;
        try {    
            if($request->numberStudent){
                $students = Student::join('users', 'students.id_student_from_users', '=', 'users.id')->where('number_student', '=', $request->numberStudent)->get();
            } else if($request->email){
                $students = User::join('students', 'users.id', '=', 'students.id_student_from_users')->where('email', '=', $request->email)->get();
            } else if($request->cardId){
                $students = User::join('students', 'users.id', '=', 'students.id_student_from_users')->where('card_id', '=', $request->cardId)->get();
            } else if($request->name){
                $students = User::join('students', 'users.id', '=', 'students.id_student_from_users')->where('name', 'like', '%' . $request->name . '%')->get();
            } else if($request->StudentCareer){
                $students = Student::join('users', 'students.id_student_from_users', '=', 'users.id')->where('acronym_career', '=', $request->StudentCareer)->get();
            } 
        } catch (\Exception $e) {
            return view('admin.Student.index', [
                'error' => 'Erro ao encontra o Estudante'
            ]);
        }
        if($students){
            foreach ($students as $student) {        
                $student->password = 'No access';
            }
        } else {
            return view('admin.Student.index', [
                'error' => 'Erro ao encontra o Estudante'
            ]);
        }
        return view('admin.Student.studentsList', compact('students'));
    }
}
