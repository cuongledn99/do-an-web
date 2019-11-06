<?php

use Illuminate\Http\Request;

/**
 * adminpage api
 */
Route::get('user/allRoles','UserController@getRoles');
Route::get('/user/{id}','UserController@getUserInfo');
Route::post('/user/{id}','UserController@updateUser');
Route::get('user/allRoles','UserController@getRoles');

Route::delete('admin/user/{id}','AdminPageController@deleteUser');
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

