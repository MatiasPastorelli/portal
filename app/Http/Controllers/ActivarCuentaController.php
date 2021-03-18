<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use App\LogCorreoEnviado;
use App\Mail\BienvenidoEmail; // contiene codigo para recibir parametros y enviar correo
use App\Helpers\AvisosHelper;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;
use Validator;

class ActivarCuentaController extends Controller
{
    public function activarCuenta(Request $request) {
    	// activar cuenta luego de recibir token
    	// NOTA: dado que peticion origen proviene fuera de Laravel, no se pueden ejecutar toastr y otros elementos JS; con comportamientos de Page Expired en caso de continuar operando con el sitio. Se llamarán mediante redirect a paginas tipo "alertas" con la información relativa a cada caso
    	try {
	    	if ($request) {
	    		if (isset($request->t)) {
	    			// DEPRECATED
                    //$rut = Crypt::decrypt($request->t);
	    			//$usuarioEncontrado = Usuario::where('rut', '=', $rut)->firstOrFail();
                    
                    $usuarioEncontrado = Usuario::where('tokenCorto', '=', $request->t)->firstOrFail();
	    			if ($usuarioEncontrado) {
	    				// detectando si la cuenta esta previamente activada
	    				if ($usuarioEncontrado->cuentaActivada == 1) {
                            toastr()->error('Su cuenta ya fue activada');
	    					return redirect('/');
	    				} else {
	    					// activando la cuenta si no está activada aun

                                                            
		    				$usuarioEncontrado->cuentaActivada = 1;
		    				$usuarioEncontrado->save();
	    				}
	    			}
                    /*
                    // enviando correo electronico de bienvenida
                    $datosCorreo = new \stdClass();
                    $datosCorreo->rut = $usuarioEncontrado->rut;
                    $datosCorreo->correo = $usuarioEncontrado->correo;
                    $datosCorreo->contrasena = $usuarioEncontrado->password;
                    $datosCorreo->sender = 'touchbar';
                    $datosCorreo->receiver = $usuarioEncontrado->nombre;

                    // agregando datos del registro random al footer (REQUERIMIENTO)
                    $paraFooter = AvisosHelper::obtenerFooterAleatorio();

                    if ($paraFooter->idTipoFooter == 1) { // si es TESTIMONIO
                        $datosCorreo->idTipoFooter = $paraFooter->idTipoFooter;
                        $datosCorreo->epigrafe = $paraFooter->epigrafe;
                        $datosCorreo->titulo = $paraFooter->titulo;
                        $datosCorreo->imagenTestimonio = $paraFooter->imagenTestimonio;
                        $datosCorreo->textoResumen = $paraFooter->textoResumen;
                        $datosCorreo->linkVideo = $paraFooter->linkVideo;
                    } else { // si es NOTICIA
                        $datosCorreo->idTipoFooter = $paraFooter->idTipoFooter;
                        $datosCorreo->titulo = $paraFooter->titulo;
                        $datosCorreo->imagenNoticia = $paraFooter->imagenNoticia;
                        $datosCorreo->textoResumen = $paraFooter->textoResumen;
                    }

                    Mail::to($usuarioEncontrado->correo)->send(new BienvenidoEmail($datosCorreo)); // datosCorreo a $data en el mail

                    // registrando log mail enviado
                    $nuevoLog = new LogCorreoEnviado();
                    $nuevoLog->idUsuario = $usuarioEncontrado->idUsuario;
                    $nuevoLog->idConcepto = 2;
                    $nuevoLog->save();*/
                    toastr()->success('Su cuenta fue activada correctamente');
	    			return redirect('/login');
	    		}
	    	}
    	} catch (ModelNotFoundException $e) {
    		return redirect('notificaciones/cuentaNoEncontrada');
    	} catch (QueryException $e) {
    		// TODO: catch a una tabla para alertar a soporte en caso de error masivo
    		return redirect('notificacion/errorInterno');
    	} catch (DecryptException $e) {
    		// TODO: catch a una tabla para alertar a soporte en caso de error masivo
    		return redirect('notificacion/errorInterno');
    	}
    }

    public function activarCuentaSMS(Request $request) { // GET ../api/activarCuentaSMS?tsms=.....

        // activacion de cuenta mediante SMS "NO UTILIZANDO Crypt" sino que llegando directamente al idUsuario
        try {
            if ($request) {
                if (isset($request->tsms)) {
                    // DEPRECATED
                    //$rut = Crypt::decrypt($request->t);
                    //$usuarioEncontrado = Usuario::where('rut', '=', $rut)->firstOrFail();
                    
                    $usuarioEncontrado = Usuario::where('idUsuario', '=', $request->tsms)->firstOrFail();
                    if ($usuarioEncontrado) {
                        // detectando si la cuenta esta previamente activada
                        if ($usuarioEncontrado->cuentaActivada == true) {
                            return redirect('notificacion/cuentaYaActivada');
                        } else {
                            // activando la cuenta si no está activada aun
                            $usuarioEncontrado->cuentaActivada = true;
                            $usuarioEncontrado->fechaActivada = date('Y-m-d H:i:s');
                            $usuarioEncontrado->save();
                        }
                    }

                    // enviando correo electronico de bienvenida
                    $datosCorreo = new \stdClass();
                    $datosCorreo->rut = $usuarioEncontrado->rut;
                    $datosCorreo->correo = $usuarioEncontrado->correo;
                    $datosCorreo->contrasena = $usuarioEncontrado->contrasena;
                    $datosCorreo->sender = 'isbast';
                    $datosCorreo->receiver = $usuarioEncontrado->nombre;

                    // agregando datos del registro random al footer (REQUERIMIENTO)
                    $paraFooter = AvisosHelper::obtenerFooterAleatorio();

                    if ($paraFooter->idTipoFooter == 1) { // si es TESTIMONIO
                        $datosCorreo->idTipoFooter = $paraFooter->idTipoFooter;
                        $datosCorreo->epigrafe = $paraFooter->epigrafe;
                        $datosCorreo->titulo = $paraFooter->titulo;
                        $datosCorreo->imagenTestimonio = $paraFooter->imagenTestimonio;
                        $datosCorreo->textoResumen = $paraFooter->textoResumen;
                        $datosCorreo->linkVideo = $paraFooter->linkVideo;
                    } else { // si es NOTICIA
                        $datosCorreo->idTipoFooter = $paraFooter->idTipoFooter;
                        $datosCorreo->titulo = $paraFooter->titulo;
                        $datosCorreo->imagenNoticia = $paraFooter->imagenNoticia;
                        $datosCorreo->textoResumen = $paraFooter->textoResumen;
                    }

                    Mail::to($usuarioEncontrado->correo)->send(new BienvenidoEmail($datosCorreo)); // datosCorreo a $data en el mail

                    // registrando log mail enviado
                    $nuevoLog = new LogCorreoEnviado();
                    $nuevoLog->idUsuario = $usuarioEncontrado->idUsuario;
                    $nuevoLog->idConcepto = 2;
                    $nuevoLog->save();

                    return redirect('notificacion/cuentaActivadaCorrectamente');
                }
            }
        } catch (ModelNotFoundException $e) {
            return redirect('notificacion/cuentaNoEncontrada');
        } catch (QueryException $e) {
            // TODO: catch a una tabla para alertar a soporte en caso de error masivo
            return redirect('notificacion/errorInterno');
        } catch (DecryptException $e) {
            // TODO: catch a una tabla para alertar a soporte en caso de error masivo
            return redirect('notificacion/errorInterno');
        }
    }

    public function cuentaYaActivada() {
    	return view ('notificaciones.cuentapreviamenteactivada');
    }

    public function cuentaActivadaCorrectamente() {
    	return view ('notificaciones.cuentacreada');
    }

    public function cuentaNoEncontrada() {
    	return view('notificaciones.cuentanoencontrada');
    }

    public function errorInterno() {
        return view ('notificaciones.errorinterno');
    }
}