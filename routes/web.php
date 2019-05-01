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



<<<<<<< HEAD
Route::post('/login', function() {
    return view('auth.login');
});

=======
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
>>>>>>> 24990137dd1507da3b599d386c833a9e6523b7bc
