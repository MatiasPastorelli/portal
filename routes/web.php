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
//acciones login
Route::get('/', 'PresentacionController@inicio');
Route::get('/registrar', 'UsuarioController@registrarUsuario');
Route::get('/login', 'UsuarioController@loginUsuario');
Route::post('/storeRegistrarUsuario', 'UsuarioController@storeRegistrarUsuario');
Route::post('/validarLoginUsuario', 'UsuarioController@validarLoginUsuario');
Route::get('/cerrarSesion', 'UsuarioController@cerrarSesion');
Route::get('/olvidoClave', 'UsuarioController@olvidoClave');
Route::post('/olvidoClave', 'UsuarioController@enviarLink');
Route::get('/olvidoClave-api', 'ActivarCuentaController@olvidoClave');
Route::post('reestablecer-password', 'UsuarioController@reestablecer');

//rutas de vista
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

//notificaciones
Route::get('notificacion/cuentaYaActivada', 'ActivarCuentaController@cuentaYaActivada');
Route::get('notificacion/cuentaActivadaCorrectamente', 'ActivarCuentaController@cuentaActivadaCorrectamente');
Route::get('notificacion/cuentaNoEncontrada', 'ActivarCuentaController@cuentaNoEncontrada');
Route::get('notificacion/errorInterno', 'ActivarCuentaController@errorInterno');


//propiedades
Route::get('/propiedad','PropiedadController@index');
Route::get('/propiedadCreate','PropiedadController@create');
Route::post('/propiedadStore','PropiedadController@store');

//caracteristicas
Route::get('/caracteristica','CaracteristicaController@index');
Route::get('/caracteristicaCreate','CaracteristicaController@create');
Route::post('/caracteristicaStore','CaracteristicaController@store');
Route::delete('/caracteristicaDestroy/{id}','CaracteristicaController@destroy');

//tipo caracteristicas
Route::get('/tipoCaracteristica','TipoCaracteristicaController@index');
Route::get('/tipoCaracteristicaCreate','TipoCaracteristicaController@create');
Route::post('/tipoCaracteristicaStore','TipoCaracteristicaController@store');
Route::delete('/tipoCaracteristicaDestroy/{id}','TipoCaracteristicaController@destroy');

//tipo comercial
Route::get('/tipoComercial','TipoComercialController@index');
Route::get('/tipoComercialCreate','TipoComercialController@create');
Route::post('/tipoComercialStore','TipoComercialController@store');
Route::delete('/tipoComercialDestroy/{id}','TipoComercialController@destroy');

Route::get('/caracteristicaCategoria','CaracteristicaCategoriaController@index');
Route::get('/caracteristicaCategoriaCreate','CaracteristicaCategoriaController@create');
Route::post('/caracteristicaCategoriaStore','CaracteristicaCategoriaController@store');
Route::delete('/caracteristicaCategoriaDestroy/{id}','CaracteristicaCategoriaController@destroy');
