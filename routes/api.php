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

Route::middleware('auth:api')->get('/user', function(Request $request){
    return $request->user();
});
Route::get('/mobile/classedit', 'Clas@index');
Route::post('/mobile/classedit/store', 'Clas@store');
Route::put('/mobile/classedit/update/{id}', 'Clas@update');
Route::delete('/mobile/classedit/delete/{id}', 'Clas@hapus');

