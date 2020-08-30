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
                'title' => 'Olá ' . $this->name . ',',
                'content'=> 'Bem-vindo à SGA, o seu e-mail associado é ' . $this->email . ' e a sua palavra-passe é ' . $this->password  
            ];
            Mail::send('emails.sendPassword.index',$data,function($msg){
                $msg->to($this->email,$this->name)->subject('Bem-vindo a SGA!');
            });
        } catch (\Exception $e) {
            return FileAdminDataController::reportError('/admin',$e);
        }
        return true;   
    }

    public function sendEmailPassword(){
        try {
            $data = [
                'title' => 'Olá ' . $this->name . ',',
                'content'=> 'A sua nova palavra-passe é ' . $this->password  
            ];
            Mail::send('emails.sendPassword.index',$data,function($msg){
                $msg->to($this->email,$this->name)->subject('Nova Palavra-passe SGA!');
            });
        } catch (\Exception $e) {
            return FileAdminDataController::reportError('/admin',$e);
        }
        return true;   
    }
}
