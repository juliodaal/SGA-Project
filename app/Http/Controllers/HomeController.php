<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        $x = [['discipinaName' => ['curso 1','curso 2']],['discipinaName2' => ['curso 3','curso 4']]];
        dd($x[0]);
        switch ($type) {
            case 1:
                    return view('Users.Home',[
                        'breadcrumbs' => ['Cursos'],
                        'disciplines' => ['discipinaName' => ['curso 1','curso 2']]
                    ]);       
                break;
            case 2:
                    return view('Users.Home');
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
