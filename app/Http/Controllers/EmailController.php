<?php

namespace App\Http\Controllers;

use App\Http\Controllers\FileAdminDataController;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class EmailController extends Controller
{
    protected $name;
    protected $email;
    protected $password;

    public function __construct($name,$email,$password)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }

    public function sendEmail(){
        try {
            $data = [
                'title' => 'Hola ' . $this->name . ',',
                'content'=> 'Bienvenido a SGA, su email asociado es: ' . $this->email . ' y su contraseña es : ' . $this->password  
            ];
            Mail::send('emails.sendPassword.index',$data,function($msg){
                $msg->to($this->email,$this->name)->subject('Bienvenido a SGA!');
            });
        } catch (\Exception $e) {
            return FileAdminDataController::reportError('/home',$e);
        }
        return true;   
    }

    public function sendEmailPassword(){
        try {
            $data = [
                'title' => 'Hola ' . $this->name . ',',
                'content'=> 'Su nueva contraseña es: ' . $this->password  
            ];
            Mail::send('emails.sendPassword.index',$data,function($msg){
                $msg->to($this->email,$this->name)->subject('Nueva contraseña SGA!');
            });
        } catch (\Exception $e) {
            return FileAdminDataController::reportError('/home',$e);
        }
        return true;   
    }
}
