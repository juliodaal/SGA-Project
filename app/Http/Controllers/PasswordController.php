<?php

namespace App\Http\Controllers;

use App\Student;
use App\Professor;
use App\User;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\FileAdminDataController;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class PasswordController extends Controller
{
    public function generatePassword(Request $request){
        try {
            $num = (int) $request->type;
            switch ($num) {
                case 1:
                    Student::findOrFail($request->id);
                    $user = User::join('students','users.id','=','students.id_student_from_users')
                    ->where('students.id',$request->id)
                    ->first();
                    $id = $user->id_student_from_users;
                    break;
                case 2:
                    Professor::findOrFail($request->id);
                    $user = User::join('professors','users.id','=','professors.id_professor_from_users')
                    ->where('professors.id',$request->id)
                    ->first();
                    $id = $user->id_professor_from_users;
                    break;
                case 3:
                    User::findOrFail($request->id);
                    $user = User::where('id',$request->id)
                    ->first();
                    $id = $user->id;
                    break;
            }
            $pass = Str::random(9);
            $user::where('id', $id)->update([
                'password' => Hash::make($pass)
            ]);
            $mail = new EmailController($user->name,$user->email,$pass);
            $resultSendEmail = $mail->sendEmailPassword();
            if($resultSendEmail !== true){ throw new Exception('Error en el envío del email con la contraseña para el Usuario'); }    
        } catch (\Exception $e) {
            return FileAdminDataController::reportError('/home',$e);
        }
        return redirect('/home')->with('successfully', 'Contraseña enviada con éxito');  
    }
}
