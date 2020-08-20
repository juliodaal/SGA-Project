<?php

namespace App\Http\Controllers;

use App\Administrator;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdministratorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try { 
            $administrators = User::where('type_user_from_type_users', '=', 3)->get();
        } catch (\Exception $e) {
            if(strpos($e, 'Unknown database') !== false) {
                return view('admin.index', [
                    'error' => 'Erro na ligação à base de dados'
                ]);
            }
        }
        return view('admin.Administrator.index',compact('administrators'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        try {

            $administrator = new User;

            $administrator->name = $request->name .' '. $request->lastName;
            $administrator->email = $request->email;
            $pass = Str::random(9);
            $administrator->password = Hash::make($pass);
            $administrator->type_user_from_type_users = 3;
            $administrator->card_id = $request->cardId;
            
            $administrator->save();

        } catch (\Exception $e) {
            if (strpos($e, 'Duplicate') !== false) {
                return view('admin.index', [
                    'error' => 'Este Administador já existe'
                ]);
            } else if(strpos($e, 'Unknown database') !== false) {
                return view('admin.index', [
                    'error' => 'Erro na ligação à base de dados'
                ]);
            } else {
                return view('admin.index', [
                    'error' => $e
                ]);
            }
        }
        return view('admin.index', [
            'successfully' => 'Administrador adicionado com sucesso ' . $pass
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Administrator  $administrator
     * @return \Illuminate\Http\Response
     */
    public function show(Administrator $administrator)
    {
        //
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
            if(strpos($e, 'Unknown database') !== false) {
                return view('admin.Administrator.index', [
                    'error' => 'Erro na ligação à base de dados'
                ]);
            }
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
            $administrator = User::findOrFail($id);
            $administrator->name = $request->name;
            $administrator->email = $request->email;
            $administrator->card_id = $request->cardId;
            $administrator->save();
        } catch (\Exception $e) {
            if(strpos($e, 'Unknown database') !== false) {
                return view('admin.Administrator.edit.editAdministrator', [
                    'error' => 'Erro na ligação à base de dados'
                ]);
            } else {
                return view('admin.Administrator.edit.editAdministrator', [
                    'error' => 'Erro ao alterar o Administrador',
                    'administrator' => $administrator = User::findOrFail($id)
                ]);
            }
        }
        return view('admin.Administrator.edit.editAdministrator', [
            'successfully' => 'Administrador alterado com sucesso',
            'administrator' => $administrator = User::findOrFail($id)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Administrator  $administrator
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $administrator = User::findOrFail($id);
        try {
            $administrator = User::findOrFail($id);
            $administrator->delete();
            
        } catch (\Exception $e) {
            if(strpos($e, 'Unknown database') !== false) {
                return view('admin.Administrator.index', [
                    'error' => 'Erro na ligação à base de dados'
                ]);
            } else {
                return view('admin.Administrator.index', [
                    'error' => 'Erro ao apagar ao Administrador',
                    'administrators' => User::where('type_user_from_type_users', '=', 3)->get()
                ]);
            }
        }

        return view('admin.Administrator.index', [
            'successfully' => 'Administrador foi apagado com sucesso',
            'administrators' => User::where('type_user_from_type_users', '=', 3)->get()
        ]);
    }
}
