<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'PresentacionController@inicio');
Route::get('/registrar', 'UsuarioController@registrarUsuario');
Route::get('/login', 'UsuarioController@loginUsuario');
Route::post('/storeRegistrarUsuario', 'UsuarioController@storeRegistrarUsuario');
Route::post('/validarLoginUsuario', 'UsuarioController@validarLoginUsuario');
Route::get('/cerrarSesion', 'UsuarioController@cerrarSesion');
Route::get('/terminos', function () {
    return view('terminos/terminosCondiciones');
});
Route::get('/declaracionPrivacidad', function () {
    return view('terminos/declaracionPrivacidad');
});
Route::get('/privacidadConfidencialidad', function () {
    return view('terminos/privacidadConfidencialidad');
});
Route::get('/terminosUso', function () {
    return view('terminos/terminosCondicionesUso');
});

Route::get('notificacion/cuentaYaActivada', 'ActivarCuentaController@cuentaYaActivada');
Route::get('notificacion/cuentaActivadaCorrectamente', 'ActivarCuentaController@cuentaActivadaCorrectamente');
Route::get('notificacion/cuentaNoEncontrada', 'ActivarCuentaController@cuentaNoEncontrada');
Route::get('notificacion/errorInterno', 'ActivarCuentaController@errorInterno');