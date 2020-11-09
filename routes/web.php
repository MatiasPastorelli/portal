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