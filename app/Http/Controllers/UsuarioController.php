<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\QueryException;
use App\Http\Requests\storeRegistrarUsuarioRequest;
use App\Http\Requests\validarLoginRequest;
use App\Usuario;
use Session;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    // *** METODO DE REGISTRO Y LOGIN DE USUARIO ***
    public function registrarUsuario() {

        return view ('presentacion.registrar');
    }

    public function storeRegistrarUsuario(storeRegistrarUsuarioRequest $request) {

        $usuario = new Usuario($request->all());
        $usuario->tokenCorto = uniqid();
        $usuario->tokenLargo = Crypt::encrypt($usuario->idUsuario);
        $usuario->save();

        $this->variablesLoginASession($usuario);

        return redirect('/');
    }

    public function loginUsuario() {

        return view ('presentacion.login');
    }

    public function validarLoginUsuario(validarLoginRequest $request) {
        
        try {
            $usuario = Usuario::where('email', '=', $request->email)
                                ->where('password', '=', $request->password)
                                ->firstOrFail();

            $this->variablesLoginASession($usuario);

            return redirect('/');

        } catch (ModelNotFoundException $e) {
            return back();
        } catch (Exception $e) {
            return back();
        }

    }

    public function cerrarSesion() {

        $this->forgetVariablesLoginSession();

        return redirect('/');
    }
    

    private function variablesLoginASession($usuario) {

        Session::put('idUsuario', $usuario->idUsuario);
        Session::put('idTipoUsuario', $usuario->idTipoUsuario);
        Session::put('email', $usuario->email);
        Session::put('nombre', $usuario->nombre);
        Session::put('apellido', $usuario->apellido);

        return;
    }

    private function forgetVariablesLoginSession() {

        Session::forget('idUsuario');
        Session::forget('idTipoUsuario');
        Session::forget('email');
        Session::forget('nombre');
        Session::forget('apellido');

        return;
    }
}
