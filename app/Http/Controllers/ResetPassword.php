<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\FileAdminDataController;
use App\User;
use Exception;

class ResetPassword extends Controller
{
    public function forgotPassword(Request $request){
        try {
            $user = User::where('email',$request->email)->first();
            if(is_null($user))  throw new Exception('Usuario no existe :('); 
            $pass = Str::random(9);
            $user::where('id',$user->id)->update([
                'password' => Hash::make($pass)
            ]);
            $data = new EmailController($user->name,$request->email,$pass);
            $data->sendEmailPassword();
        } catch (\Exception $e) {
            return FileAdminDataController::reportError('/password/reset',$e);
        }
        return redirect('/password/reset')->with('successfully', 'Contraseña enviada al Email ' . $request->email);
    }
}
