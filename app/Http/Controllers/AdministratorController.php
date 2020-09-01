<?php

namespace App\Http\Controllers;

use App\Administrator;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Http\Controllers\FileAdminDataController;
use App\Http\Controllers\EmailController;
use Exception;

class AdministratorController extends Controller
{

    public function __construct()
    {
        $this->middleware('topAdmin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.index');
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
            return FileAdminDataController::validateFile($request,'document','xlsx','excel_files','FileAdminDataController@administrator','/admin');
        } else {
            $this->validate($request, [
                'name'=>'required',
                'lastName'=>'required',
                'email'=>'required',
                'cardId'=>'required'
            ]);
            try {
                $msg = '"'. $request->email . ' ou ' . '"' .$request->cardId. '"';
                $pass = Str::random(9);
                User::create([
                    'name'=> $request->name .' '. $request->lastName,
                    'email'=> $request->email,
                    'password'=> Hash::make($pass),
                    'type_user_from_type_users'=> 3,
                    'card_id'=> $request->cardId
                ]);
                $mail = new EmailController($request->name,$request->email,$pass);
                $resultSendEmail = $mail->sendEmail();
                if($resultSendEmail !== true){ throw new Exception('Erro no envio do Email com a Senha para o Utilizador'); }
            } catch (\Exception $e) {
                if(!isset($msg)){ $msg = null; }
                return FileAdminDataController::reportError('/admin',$e,$msg);
            }
            return redirect('/admin')->with('successfully', 'Administrador adicionado com sucesso ');  
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Administrator  $administrator
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        try { 
            $administrators = User::where('type_user_from_type_users', '=', 3)->get();
        } catch (\Exception $e) {
            return FileAdminDataController::reportError('/admin',$e);
        }
        return view('admin.Administrator.index',compact('administrators'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Administrator  $administrator
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $administrator = User::findOrFail($id);
        } catch (\Exception $e) {
            return FileAdminDataController::reportError('/admin/discipline',$e);
        }
        return view('admin.Administrator.edit.editAdministrator', \compact('administrator'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Administrator  $administrator
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $this->validate($request, [
                'name'=>'required',
                'email'=>'required',
                'cardId'=>'required'
            ]);
            $administrator = User::findOrFail($id);
            $administrator::where('id', $id)->update([
                'name'=> $request->name,
                'email'=> $request->email,
                'card_id'=> $request->cardId
            ]);
        } catch (\Exception $e) {
            return FileAdminDataController::reportError('/admin/administrator/' . $id . '/edit',$e);
        }
        return redirect('/admin/administrator')->with('successfully', 'Adminitrador alterado com sucesso'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Administrator  $administrator
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $administrator = User::findOrFail($id)->delete();
        } catch (\Exception $e) {
            return FileAdminDataController::reportError('/admin/administrator',$e);
        }
        return redirect('/admin/administrator')->with('successfully', 'Administrador apagado com sucesso'); 
    }
}
