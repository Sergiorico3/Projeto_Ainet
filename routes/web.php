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

Route::patch('/password', 'UserController@changepasswordstore')->name('socios.changepasswordstore');
Route::get('/password', 'UserController@changepassword')->name('socios.changepassword');
Auth::routes(['register'=>false, 'verified'=>true]);


//Home
Route::get('/', 'HomeController@home');


//Password
//Route::get('/password', 'Auth.LoginController@passwordShow')->name('password.change')->middleware('auth');
//Route::patch('/password', 'Auth.LoginController@passwordSave')->name('password.save')->middleware('auth');

//email
//Route::get('/email/verify/{id}', 'LoginController@verifyEmail')->name('email')->middleware('auth');

//fotos //já não é preciso, foi substituida por Storage::disk...
//Route::get('storage/fotos/{foto}', 'UserController@getfile')->name('getfile')->middleware('auth');

//socio
Route::group(['middleware'=>['auth','verified','ativo']],function(){
    Route::get('/home', 'HomeController@index')->name('home.index');
    Route::patch('/socios/reset_quotas', 'UserController@reset_quotas')->name('socios.reset_quotas')->middleware('IsDirecao');
    Route::patch('/socios/{socio}/quota', 'UserController@quota')->name('socios.quota')->middleware('IsDirecao');
    Route::patch('/socios/{socio}/ativo', 'UserController@ativar')->name('socios.ativar')->middleware('IsDirecao');
    Route::patch('/socios/desativar_sem_quotas', 'UserController@desativar')->name('socios.desativar')->middleware('IsDirecao');
    
    
    
    Route::resource('socios', 'UserController');
    
    
    
    Route::get('/socios', 'UserController@index')->name('socios.index')->middleware('auth');
    Route::get('/socios/{socio}/edit', 'UserController@edit')->name('socios.edit')->middleware('auth');
    Route::get('/socios/create', 'UserController@create')->name('socios.create');//->middleware('isDirecao');
    Route::post('/socios', 'UserController@store')->name('socios.store');//->middleware('isDirecao');
    Route::put('/socios/{socio}', 'UserController@update')->name('socios.update')->middleware('auth');
    Route::delete('/socios/{socio}', 'UserController@delete')->name('socios.delete')->middleware('IsDirecao');
    
    //Route::post('/socios/{socio}/send_reactivate_mail', 'UserController@reset_quotas')->name('socios.send_reactivate_mail')->middleware('auth');
    
    Route::get('/pilotos/{piloto}/certificado', 'UserController@mostrarCertificado')->name('socios.mostrarcertificado');
    Route::get('/pilotos/{piloto}/licenca', 'UserController@mostrarLicenca')->name('socios.mostrarlicenca');
    
    //aeronaves
    Route::resource('aeronaves', 'AeronaveController', ['parameters'=>['aeronaves'=>'aeronave']])->except('show');
    Route::get('/aeronaves/linha_temporal');//todo 
    Route::get('/aeronaves/{aeronave}/piloto', 'AeronaveController@listaPilotos')->name('aeronaves.listaPilotos');
    Route::post('/aeronaves/{aeronave}/pilotos/{piloto}', 'AeronaveController@acrescentar')->name('aeronaves.acrescentar');
    Route::delete('/aeronaves/{aeronave}/pilotos/{piloto}', 'AeronaveController@remover')->name('aeronaves.remover');

    
    //movimentos
    Route::resource('movimentos', 'MovimentoController', ['parameters'=>['movimentos'=>'movimento']])->except('show');
    Route::get('/movimentos/estatisticas', 'MovimentoController@estatisticas')->name('movimentos.estatisticas')->middleware('auth');
});
