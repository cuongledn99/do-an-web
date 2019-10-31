<?php

use Illuminate\Http\Request;

/**
 * adminpage api
 */
Route::get('/user/{id}','UserController@getUserInfo');
Route::post('/user/{id}','UserController@updateUser');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

