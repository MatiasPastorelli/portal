<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\QueryException;
use App\Http\Requests\storeRegistrarUsuarioRequest;
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

        Session::put('idUsuario', $usuario->idUsuario);
        Session::put('idTipoUsuario', $usuario->idTipoUsuario);
        Session::put('email', $usuario->email);
        Session::put('nombre', $usuario->nombre);
        Session::put('apellido', $usuario->apellido);

        return redirect('/');
    }

    public function loginUsuario() {

        return view ('presentacion.login');
    }

    public function validarLoginUsuario(Request $request) {


    }
}
