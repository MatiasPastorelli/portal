<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\QueryException;
use App\Http\Requests\storeRegistrarUsuarioRequest;
use App\Http\Requests\validarLoginRequest;
use App\Usuario;
use Mail;
use App\Mail\ActivarCuentaEmail;
use App\Mail\OlvidoClaveEmail;
use Session;
use Symfony\Component\HttpFoundation\Request as HttpFoundationRequest;
use App\Actions\VerificarRutAction;



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

    public function reestablecer(Request $request)
    {
        $rules = [
            'password' =>
                ['required',
                'min:6',
                'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\X]).*$/'],
            'password2' =>
                ['required',
                'min:6',
                'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\X]).*$/']];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails())
        {
            $errors = $validator->errors();
            //return $errors;
            return back()->with('errors', $errors);
        }

            if ($request->password != null || $request->password2 != null) {
	    		if ($request->password == $request->password2 ) {

                    $usuarioEncontrado = Usuario::where('tokenCorto', '=', $request->t)
                    ->update(['passwordUsuario' => $request->password2]);

                    toastr()->success('Su contraseña se reestablecio correctamente');
	    			return redirect('/login');
	    		}else
                {
                    toastr()->error('La password tiene que ser igual');
	    			return back();
                }
	    	}

    }
    // *** METODO DE REGISTRO Y LOGIN DE USUARIO ***
    public function registrarUsuario()
    {

        return view('presentacion.registrar');
    }

    public function storeRegistrarUsuario(Request $request)
    {

        $rules = [
            'rut' => 'required',
            'nombre' => 'required',
            'apellido' => 'required',
            'email' => 'required',
            'password' =>
                ['required',
                'min:6',
                'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\X]).*$/'],  // contener mayus, minus y numeros
            'checktc' => 'required'];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails())
        {
            $errors = $validator->errors();
            //return $errors;
            return back()->with('errors', $errors);
        }

        $VerificarRutAction = new VerificarRutAction();
        $a = $VerificarRutAction->execute($request->rut);

        if($a == false)
        {
            toastr()->error('El rut ingresado no es valido');
            return back();
        }

        $usuario = new Usuario([
            'nombreUsuario' => $request->nombre,
            'apellidoUsuario' => $request->apellido,
            'rutUsuario' => $request->rut,
            'emailUsuario' => $request->email,
            'passwordUsuario' => $request->password,
            'aceptaTerminos' => 1,
            'tokenCorto' => uniqid(),
            'cuentaActivada' => 0,
        ]);

        $usuario->save();


        $datosCorreo = new \stdClass();
        $datosCorreo->token = $usuario->tokenCorto;
        $datosCorreo->sender = 'touchouse';
        $datosCorreo->receiver = "Usuario";
        $datosCorreo->idTipoFooter = 1;
       // $datosCorreo->titulo = $paraFooter->titulo;
        //$datosCorreo->imagenNoticia = $paraFooter->imagenNoticia;
        //$datosCorreo->textoResumen = $paraFooter->textoResumen;

        Mail::to($request->email)
                            ->bcc('matias@informatica.isbast.com')
                            ->send(new ActivarCuentaEmail($datosCorreo));

        toastr()->success('Active su cuenta mediante el correo enviado', "Se ha enviado un correo electronico a su email para activar su cuenta", ['positionClass' => 'toast-bottom-right']);
        //$this->variablesLoginASession($usuario);
        return redirect('/login');
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

            if($usuario->cuentaActivada == 0)
            {
                toastr()->error('Su cuenta aun no a sido activada');
                return back();
            }


            $this->variablesLoginASession($usuario);

            return redirect('/');
        } catch (ModelNotFoundException $e) {
            toastr()->error('Correo o password incorrecto');
            return back();
        } catch (Exception $e) {
            return back();
        }
    }

    public function olvidoClave() {

        return view('presentacion.olvidoClave');
    }

    public function enviarLink(Request $request) { // POST

        try {
            $rules = ['email' => 'required'];

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails())
            {
                return back()->with('errors', $errors);
            }

            $usuarioEncontrado = Usuario::where('emailUsuario', '=', $request->email)->firstOrFail();

            $datosCorreo = new \stdClass();
            $datosCorreo->token = $usuarioEncontrado->tokenCorto;
            $datosCorreo->sender = 'touchouse';
            $datosCorreo->receiver = $usuarioEncontrado->nombreUsuario;
            $datosCorreo->rut = $usuarioEncontrado->rutUsuario;
            $datosCorreo->correo = $usuarioEncontrado->emailUsuario;
            $datosCorreo->contrasena = $usuarioEncontrado->passwordUsuario;
            $datosCorreo->idTipoFooter = 1;
         // $datosCorreo->titulo = $paraFooter->titulo;
          //$datosCorreo->imagenNoticia = $paraFooter->imagenNoticia;
          //$datosCorreo->textoResumen = $paraFooter->textoResumen;

            Mail::to($request->email)->send(new OlvidoClaveEmail($datosCorreo));


            toastr()->success('Se ha enviado un correo con los datos de acceso');
            return redirect('/login');

        } catch (ModelNotFoundException $e) {
            toastr()->warning('No se encontro el correo dentro de los registros de isbast. Debe ingresar el correo con el cual se registró.');
            return redirect('/olvidoClave');
        } catch (QueryException $e) {
            // error conexion a BBDD
            toastr()->warning('Se ha producido un error interno. Favor intente nuevamente');
            return redirect('/olvidoClave');
        } catch (\Exception $e) {
            toastr()->warning('Se ha producido un error. Favor intente nuevamente. ' . $e->getMessage());
            return redirect('/olvidoClave');
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
