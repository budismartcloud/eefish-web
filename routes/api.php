<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', 'Api\ApiLoginController@validateLogin');
Route::post('/register', 'Api\ApiRegisterController@register');
Route::get('/fish-category', 'Api\ApiKategoriIkanController@index');
Route::get('/fish-size-category', 'Api\ApiKategoriUkuranIkanController@index');
Route::get('/fish', 'Api\ApiIkanController@index');
Route::get('/{id}/profile', 'Api\ApiProfileController@index');
Route::get('/fish/filter', 'Api\ApiIkanController@filtered');
