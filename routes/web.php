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

/* Route Student */
Route::get('/studentedit', 'Students@index');
Route::post('/studentedit/store', 'Students@store');
Route::get('/studentedit/create', 'Students@create');
Route::get('/studentedit/{studentedit}', 'Students@show');
Route::put('/studentedit/{studentedit}', 'Students@update');
Route::delete('/studentedit/{studentedit}', 'Students@hapus');
Route::get('/studentedit/{studentedit}/edit', 'Students@edit');

/* Route Consume API */
Route::prefix('consumes')->group(function () {
    Route::get('api', 'Consumes@api')->name('api');
});
