<?php

namespace App\Http\Controllers;

use App\User;
use App\Student;
use App\Career;
use App\Http\Controllers\FileAdminDataController;
use App\Http\Requests\StudentsRequest;
use App\Http\Requests\StudentsRequestEdit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Exception;


class StudentController extends Controller
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
        if(!is_null($request->document)){
            return FileAdminDataController::validateFile($request,'document','xlsx','excel_files','FileAdminDataController@student','/admin');
        } else {
            try {
                $this->validate($request, [
                    'name'=>'required',
                    'lastName'=>'required',
                    'numberStudent'=>'required',
                    'email'=>'required',
                    'cardId'=>'required',
                    'studentCareer'=>'required'
                ]);

                $msg = '"'. $request->name . '" - "' . $request->email . '" - "' . $request->numberStudent . '"';
                $validateCareer = FileAdminDataController::validateCareers($request);
                
                if($validateCareer === true){
                    $pass = Str::random(9);
                    $user = User::create([
                        'name' => $request->name .' '. $request->lastName,
                        'email' => $request->email,
                        'password' => Hash::make($pass),
                        'type_user_from_type_users' => 1,
                        'card_id' => $request->cardId
                    ]);

                    $i = 0;
                    $limitStudents = 30;
                    do {
                        $numStudents = Student::where('students.group', '=', $i)->get();
                        if(count($numStudents) >= $limitStudents){
                            $i++;
                        }
                    } while (count($numStudents) >= $limitStudents);

                    $student = Student::create([
                        'number_student' => $request->numberStudent,
                        'id_student_from_users' => $user->id,
                        'acronym_career' => strtoupper($request->studentCareer),
                        'acronym_career_two' => strtoupper($request->studentCareerTwo),
                        'acronym_career_three' => strtoupper($request->studentCareerThree),
                        'group' => $i
                    ]);
                } else {
                    throw new Exception('Curso não existe');
                }
            } catch (\Exception $e) {
                if(isset($user)){ $user->delete(); }
                if(isset($student)){ $student->delete(); }

                if(!isset($msg)){ $msg = null; }
                return FileAdminDataController::reportError('/admin',$e,$msg);
            }
            return redirect('/admin')->with('successfully', 'Estudante adicionado com sucesso ' . $pass);  
        }
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
    public function edit($id)
    {
        try {
            $student = Student::findOrFail($id); 
            $student = User::join('students', 'users.id', '=', 'students.id_student_from_users')->where('students.id', '=', $id)->first();  
        } catch (\Exception $e) {
            return FileAdminDataController::reportError('/admin/student',$e);
        }
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
            $validateCareer = FileAdminDataController::validateCareers($request);

            if($validateCareer === true){
                $student = Student::findOrFail($id);
                $user = User::where('id', '=', $student->id_student_from_users)->first();

                $student::where('id', $id)->update([
                    'number_student' => $request->numberStudent,
                    'acronym_career' => strtoupper($request->studentCareer),
                    'acronym_career_two' => strtoupper($request->studentCareerTwo),
                    'acronym_career_three' => strtoupper($request->studentCareerThree)
                ]);

                $user::where('id', $student->id_student_from_users)->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'card_id' => $request->cardId
                ]);

            } else {
                throw new Exception('Curso não existe');
            }
        } catch (\Exception $e) {
            return FileAdminDataController::reportError('/admin/student',$e);
        }
        return redirect('/admin/student')->with('successfully', 'Estudante alterado com sucesso');
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
            return FileAdminDataController::reportError('/admin/student',$e);
        }
        return redirect('/admin/student')->with('successfully', 'Estudante foi apagado com sucesso'); 
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
                $students = Student::join('users', 'students.id_student_from_users', '=', 'users.id')->where('number_student', '=', $request->numberStudent)->select('students.id','name')->get();
            } else if($request->email){
                $students = User::join('students', 'users.id', '=', 'students.id_student_from_users')->where('email', '=', $request->email)->select('students.id','name')->get();
            } else if($request->cardId){
                $students = User::join('students', 'users.id', '=', 'students.id_student_from_users')->where('card_id', '=', $request->cardId)->select('students.id','name')->get();
            } else if($request->name){
                $students = User::join('students', 'users.id', '=', 'students.id_student_from_users')->where('name', 'like', '%' . $request->name . '%')->select('students.id','name')->get();
                if($request->name == '*'){
                    $students = User::join('students', 'users.id', '=', 'students.id_student_from_users')->select('students.id','name')->get();
                }
            } else if($request->StudentCareer){
                $students = Student::join('users', 'students.id_student_from_users', '=', 'users.id')->where('acronym_career', '=', $request->StudentCareer)->select('students.id','name')->get();
            } else {
                throw new Exception('Erro ao encontra o Estudante');
            }
        } catch (\Exception $e) {
            return FileAdminDataController::reportError('/admin/student',$e);
        }
        return view('admin.Student.studentsList', compact('students'));
    }
}
