<?php
use App\Http\Controllers\UserController;

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
Route::get('/', 'HomeController@home');
Route::get('/home', 'HomeController@index')->name('home.index');

//Password
//Route::get('/password', 'Auth.LoginController@passwordShow')->name('password.change')->middleware('auth');
//Route::patch('/password', 'Auth.LoginController@passwordSave')->name('password.save')->middleware('auth');

//email
//Route::get('/email/verify/{id}', 'LoginController@verifyEmail')->name('email')->middleware('auth');

//fotos
Route::get('storage/fotos/{foto}', 'UserController@getfile')->name('getfile')->middleware('auth');

//socio
Route::get('/socios', 'UserController@index')->name('socios.index')->middleware('auth');
Route::get('/socios/{socio}/edit', 'UserController@edit')->name('socios.edit')->middleware('auth');
Route::get('/socios/create', 'UserController@create')->name('socios.create')->middleware('isDirecao');
Route::post('/socios', 'UserController@store')->name('socios.store')->middleware('isDirecao');
Route::put('/socios/{socio}', 'UserController@update')->name('socios.update')->middleware('auth');
Route::delete('/socios/{socio}', 'UserController@delete')->name('socios.delete')->middleware('isDirecao');
Route::patch('/socios/{socio}/quota', 'UserController@quota')->name('socios.quota')->middleware('auth');
Route::patch('/socios/reset_quotas', 'UserController@reset_quotas')->name('socios.reset_quotas')->middleware('auth');
Route::patch('/socios/{socio}/ativo', 'UserController@ativar')->name('socios.ativar')->middleware('isDirecao');
Route::patch('/socios/desativar_sem_quotas', 'UserController@desativar')->name('socios.desativar')->middleware('isDirecao');
Route::post('/socios/{socio}/send_reactivate_mail', 'UserController@reset_quotas')->name('socios.send_reactivate_mail')->middleware('auth');
/*
Route::resource('socios', 'UserController');

//aeronaves
Route::resource('aeronaves', 'AeronaveController')->except('show');

//movimentos
Route::resource('movimentos', 'MovimentoController');
