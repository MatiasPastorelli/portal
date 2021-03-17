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
use Symfony\Component\HttpFoundation\Request as HttpFoundationRequest;

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
    public function registrarUsuario()
    {

        return view('presentacion.registrar');
    }

    public function storeRegistrarUsuario(Request $request)
    {

        $findUsuario = Usuario::where('emailUsuario', $request->email)->first();

        if ($findUsuario) {
            toastr()->error('El correo ingresado ya existe');
            return back();
        }

        $usuario = new Usuario([
            'nombreUsuario' => $request->nombre,
            'apellidoUsuario' => $request->apellido,
            'emailUsuario' => $request->email,
            'passwordUsuario' => $request->password,
        ]);
        //$usuario->tokenCorto = uniqid();
        //$usuario->tokenLargo = Crypt::encrypt($usuario->idUsuario);
        $usuario->save();

        $this->variablesLoginASession($usuario);


        return redirect('/');
    }

    public function loginUsuario()
    {

        return view('presentacion.login');
    }

    public function validarLoginUsuario(Request $request)
    {

        try {
            $usuario = Usuario::where('emailUsuario', '=', $request->email)
                ->where('passwordUsuario', '=', $request->password)
                ->firstOrFail();

            $this->variablesLoginASession($usuario);

            return redirect('/');
        } catch (ModelNotFoundException $e) {
            return back();
        } catch (Exception $e) {
            return back();
        }
    }

    public function cerrarSesion()
    {

        $this->forgetVariablesLoginSession();

        return redirect('/');
    }


    private function variablesLoginASession($usuario)
    {

        Session::put('idUsuario', $usuario->idUsuario);
        //Session::put('idTipoUsuario', $usuario->idTipoUsuario);
        Session::put('emailUsuario', $usuario->email);
        Session::put('nombreUsuario', $usuario->nombre);
        Session::put('apellidoUsuario', $usuario->apellido);

        return;
    }

    private function forgetVariablesLoginSession()
    {

        Session::forget('idUsuario');
        //Session::forget('idTipoUsuario');
        Session::forget('emailUsuario');
        Session::forget('nombreUsuario');
        Session::forget('apellidoUsuario');

        return;
    }
}
