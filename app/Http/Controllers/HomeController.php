<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Program;
use App\Student;
use App\EducationalPlan;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    { 
        $type = $this->verifyTypeUser();
        switch ($type) {
            case 1:
                $student = User::join('students', 'users.id', '=', 'students.id_student_from_users')
                ->where('email', '=', session()->get('email'))
                ->select('number_student')
                ->first();

                $inscriptions = Student::join('inscriptions', 'students.number_student', '=','inscriptions.number_student_from_students')
                ->where('number_student_from_students', '=', $student->number_student)
                ->select('acronym_discipline_from_disciplines','acronym_career_from_careers')
                ->orderBy('acronym_career_from_careers')
                ->get();
                    return view('Users.Home',[
                        'breadcrumbs' => ['Cursos'],
                        'cursos' => $inscriptions,
                        'group' => session()->get('group')
                    ]);       
                break;
            case 2:
                    $professor = User::join('professors', 'users.id', '=', 'professors.id_professor_from_users')
                    ->where('email', '=', session()->get('email'))
                    ->select('number_professor')
                    ->first();
                    $disciplines = Program::where('number_professor','=', $professor->number_professor)
                    ->groupBy('acronym_career','acronym_discipline','group_from_students')
                    ->select('acronym_career','acronym_discipline','group_from_students')
                    ->orderBy('acronym_discipline')
                    ->get();
                    return view('Users.Home',[
                        'breadcrumbs' => ['Disciplinas'],
                        'disciplines' => $disciplines
                    ]);
                break;
            case 3:
                    return view('Admin.index');
                break;    
            default:
                
                break;
        } 
    }
    public function verifyTypeUser()
    {
        $user = Auth::user();
        if($user->type_user_from_type_users == 1){
            $group = User::join('students', 'users.id', '=', 'students.id_student_from_users')
            ->where('email', '=', $user->email)
            ->select('group')
            ->first(); 
            session(['group' => $group->group]);
        }
        session(['id' => $user->id]);
        session(['name' => $user->name]);
        session(['email' => $user->email]);
        session(['type_user' => $user->type_user_from_type_users]);
        session(['card_id' => $user->card_id]);
        session()->regenerate();
        return session()->get('type_user');
    }
    public function estudentsGroup($career,$discipline,$group){
        $students = User::join('students','users.id','=','students.id_student_from_users')
        ->join('inscriptions','students.number_student','=','inscriptions.number_student_from_students')
        ->where('acronym_career_from_careers','=',$career)
        ->where('acronym_discipline_from_disciplines','=',$discipline)
        ->where('group','=',$group)
        ->get();

        $programs = Program::where('acronym_career','=',$career)
        ->where('acronym_discipline','=',$discipline)
        ->where('group_from_students','=',$group)
        ->select('date_to_class','start_class','end_class')
        ->get();
        return view('Users.GroupStudents.index', [
            'students' => $students,
            'programs' => $programs
        ]);
    }
}
