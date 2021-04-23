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
Route::post('/propiedadStorePrecio','PropiedadController@storePrecio');
Route::post('/propiedadStorePlan','PropiedadController@storePlan');
Route::delete('/propiedadDestroy/{id}','PropiedadController@destroy');
Route::post('/img/subir/{id}', 'PropiedadController@subirImagen');
Route::post('/img/eliminar/{id}', 'PropiedadController@eliminarImagen');
Route::get('/createImagen', 'PropiedadController@createImagen');


//caracteristicas
Route::get('/caracteristica','CaracteristicaController@index');
Route::get('/caracteristicaCreate','CaracteristicaController@create');
Route::post('/caracteristicaStore','CaracteristicaController@store');
Route::delete('/caracteristicaDestroy/{id}','CaracteristicaController@destroy');
Route::get('/caracteristicaEdit/{id}','CaracteristicaController@edit');
Route::post('/caracteristicaUpdate','CaracteristicaController@update');

//tipo caracteristicas
Route::get('/tipoCaracteristica','TipoCaracteristicaController@index');
Route::get('/tipoCaracteristicaCreate','TipoCaracteristicaController@create');
Route::post('/tipoCaracteristicaStore','TipoCaracteristicaController@store');
Route::delete('/tipoCaracteristicaDestroy/{id}','TipoCaracteristicaController@destroy');
Route::get('/tipoCaracteristicaEdit/{id}','TipoCaracteristicaController@edit');
Route::post('/tipoCaracteristicaUpdate','TipoCaracteristicaController@update');

//tipo comercial
Route::get('/tipoComercial','TipoComercialController@index');
Route::get('/tipoComercialCreate','TipoComercialController@create');
Route::post('/tipoComercialStore','TipoComercialController@store');
Route::delete('/tipoComercialDestroy/{id}','TipoComercialController@destroy');
Route::get('/tipoComercialEdit/{id}','TipoComercialController@edit');
Route::post('/tipoComercialUpdate','TipoComercialController@update');

//caracteristicas categorias
Route::get('/caracteristicaCategoria','CaracteristicaCategoriaController@index');
Route::get('/caracteristicaCategoriaCreate','CaracteristicaCategoriaController@create');
Route::post('/caracteristicaCategoriaStore','CaracteristicaCategoriaController@store');
Route::delete('/caracteristicaCategoriaDestroy/{id}','CaracteristicaCategoriaController@destroy');
Route::get('/caracteristicaCategoriaEdit/{id}','CaracteristicaCategoriaController@edit');
Route::post('/caracteristicaCategoriaUpdate','CaracteristicaCategoriaController@update');

//monedas
Route::get('/moneda','MonedaController@index');
Route::get('/monedaCreate','MonedaController@create');
Route::post('/monedaStore','MonedaController@store');
Route::delete('/monedaDestroy/{id}','MonedaController@destroy');
Route::get('/monedaEdit/{id}','MonedaController@edit');
Route::post('/monedaUpdate','MonedaController@update');

//plan
Route::get('/plan','PlanController@index');
Route::get('/planCreate','PlanController@create');
Route::post('/planStore','PlanController@store');
Route::delete('/planDestroy/{id}','PlanController@destroy');
Route::get('/planEdit/{id}','PlanController@edit');
Route::post('/planUpdate','PlanController@update');

//orientacion
Route::get('/orientacion','OrientacionController@index');
Route::get('/orientacionCreate','OrientacionController@create');
Route::post('/orientacionStore','OrientacionController@store');
Route::delete('/orientacionDestroy/{id}','OrientacionController@destroy');
Route::get('/orientacionEdit/{id}','OrientacionController@edit');
Route::post('/orientacionUpdate','OrientacionController@update');

//ofertas
Route::get('/oferta','OfertaController@index');
Route::get('/ofertaCreate','OfertaController@create');
Route::post('/ofertaStore','OfertaController@store');
Route::delete('/ofertaDestroy/{id}','OfertaController@destroy');
Route::get('/ofertaEdit/{id}','OfertaController@edit');
Route::post('/ofertaUpdate','OfertaController@update');

//ofertas planes
Route::get('/ofertaPlan','OfertaPlanController@index');
Route::get('/ofertaPlanCreate','OfertaPlanController@create');
Route::post('/ofertaPlanStore','OfertaPlanController@store');
Route::delete('/ofertaPlanDestroy/{id}','OfertaPlanController@destroy');
Route::get('/ofertaPlanEdit/{id}','OfertaPlanController@edit');
Route::post('/ofertaPlanUpdate','OfertaPlanController@update');
