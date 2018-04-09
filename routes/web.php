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
Route::get('/',function(){
	return 'home';
});
	
Route::get('/usuarios','UserController@index')
	->name('users');


Route::get('/usuarios/{user}','UserController@show')
	->where('user','[0-9]+')
	->name('users.show');

Route::get('usuarios/nuevo','UserController@create')
	->name('users.create');

Route::post('usuarios','UserController@store');// las peticiones post no se hacen desde el navegador.. sino desde un formulario... pero el formulario va a ubicar a esta ruta... 

Route::get('usuarios/{name}/{nickname?}','welcomeUserController');
	
