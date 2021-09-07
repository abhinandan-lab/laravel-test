<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () { return view('login');  });

Route::get('/register', function() {return view('register'); });

Route::post('/register_process', 'AccountController@register')->name('registerProcess');

Route::post('/login_process', 'AccountController@loginProcess')->name('loginProcess');

Route::get('/home','AccountController@home');

Route::get('/search', 'AccountController@search');

Route::get('/searching/{email}/{phone}/{gender}', 'AccountController@searching')->name('searching');

Route::get('/logout', function(){
    session()->forget('user_login');
    session()->forget('user_id');
    return redirect('/');
});
