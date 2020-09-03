<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\FileAdminDataController;
use App\User;
use Exception;

class ResetPassword extends Controller
{
    public function forgotPassword(Request $request){
        try {
            $name = User::where('email',$request->email)->first();
            $pass = Str::random(9);
            $data = new EmailController($name->name,$request->email,$pass);
            $data->sendEmailPassword();
        } catch (\Exception $e) {
            return FileAdminDataController::reportError('/home',$e);
        }
        return redirect('/')->with('successfully', 'Contraseña enviada al Email ' . $request->email);
    }
}
