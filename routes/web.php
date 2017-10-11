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

Route::get('/', 'BackendController@index');
Route::get('/login', 'LoginController@index');
Route::post('/login/validate', 'LoginController@validateLogin');
Route::get('/logout', 'LoginController@logout');


Route::group(['prefix' => 'master', 'namespace' => 'Master'], function () {
    Route::group(['prefix' => 'pengguna', 'middleware' => 'login-verification'], function () {
        Route::get('/', 'PenggunaController@index');
        Route::any('/add', 'PenggunaController@add');
        Route::post('/save', 'PenggunaController@save');
        Route::post('/delete', 'PenggunaController@delete');
        Route::get('/{id}/detail', 'PenggunaController@detail');
    });

    Route::group(['prefix' => 'periode', 'middleware' => 'login-verification'], function () {
        Route::get('/', 'PeriodeController@index');
        Route::any('/add', 'PeriodeController@add');
        Route::post('/save', 'PeriodeController@save');
        Route::post('/delete', 'PeriodeController@delete');
    });

    Route::group(['prefix' => 'kategori-ikan', 'middleware' => 'login-verification'], function () {
        Route::get('/', 'KategoriIkanController@index');
        Route::any('/add', 'KategoriIkanController@add');
        Route::post('/save', 'KategoriIkanController@save');
        Route::post('/delete', 'KategoriIkanController@delete');
    });

    Route::group(['prefix' => 'ukuran-ikan', 'middleware' => 'login-verification'], function () {
        Route::get('/', 'UkuranIkanController@index');
        Route::any('/add', 'UkuranIkanController@add');
        Route::post('/save', 'UkuranIkanController@save');
        Route::post('/delete', 'UkuranIkanController@delete');
    });

    Route::group(['prefix' => 'ikan', 'middleware' => 'login-verification'], function () {
        Route::get('/', 'IkanController@index');
        Route::any('/add', 'IkanController@add');
        Route::post('/save', 'IkanController@save');
        Route::post('/delete', 'IkanController@delete');
        Route::get('/{fish}/detail', 'IkanController@detail');
        Route::any('/{fish}/add-detail', 'IkanController@addDetail');
        Route::any('/{fish}/save-detail', 'IkanController@saveDetail');
        Route::any('/{fish}/delete-detail', 'IkanController@deleteDetail');
    });
});

