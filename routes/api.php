<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// register api
Route::post('/register_process', 'AccountController@register')->name('registerProcess');


// search api
Route::get('/searching/{email}/{phone}/{gender}', 'AccountController@searching')->name('searching');

// login api
Route::post('/login_process', 'AccountController@loginProcess')->name('loginProcess');




