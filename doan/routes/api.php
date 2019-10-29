<?php

use Illuminate\Http\Request;

/**
 * adminpage api
 */
Route::get('/user/{id}','AdminPageController@getUserInfo');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

