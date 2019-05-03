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

Auth::routes(['register'=>false, 'verified'=>true]);

//Home
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/{socio}', 'UserController@show')->name('home');

//Password
Route::get('/password', 'LoginController@passwordShow')->name('password.change');
Route::patch('/password', 'LoginController@passwordSave')->name('password.save');

//email
Route::get('/email/verify/{id}', 'LoginController')->name('email');

//socio
Route::get('/socios', 'UserController@show')->name('socios.show');
Route::get('/socios/{socio}/edit', 'UserController@edit')->name('socios.edit');
Route::get('/socios/create', 'UserController@create')->name('socios.create');
Route::post('/socios', 'UserController@store')->name('socios.store');
Route::put('/socios/{socio}', 'UserController@update')->name('socios.update');
Route::delete('/socios/{socio}', 'UserController@delete')->name('socios.delete');
Route::patch('/socios/{socio}/quota', 'UserController@quota')->name('socios.quota');
Route::patch('/socios/reset_quotas', 'UserController@reset_quotas')->name('socios.reset_quotas');
Route::patch('/socios/{socio}/ativo', 'UserController@ativar')->name('socios.ativar');
Route::patch('/socios/desativar_sem_quotas', 'UserController@desativar')->name('socios.desativar');
Route::post('/socios/{socio}/send_reactivate_mail', 'UserController@reset_quotas')->name('socios.send_reactivate_mail');

//aeronaves
//...
