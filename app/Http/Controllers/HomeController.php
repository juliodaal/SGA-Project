<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Program;
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
                    return view('Users.Home',[
                        'breadcrumbs' => ['Cursos']
                        // 'disciplines' => ['discipinaName' => ['curso 1','curso 2']]
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
        session(['id' => $user->id]);
        session(['name' => $user->name]);
        session(['email' => $user->email]);
        session(['type_user' => $user->type_user_from_type_users]);
        session(['card_id' => $user->card_id]);
        session()->regenerate();
        return session()->get('type_user');
        
    }
}
