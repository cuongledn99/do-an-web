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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/admin','AdminPageController@renderAdminPage');
Route::get('/manageStaff','AdminPageController@renderStaff');
Route::get('admin/manageUser','AdminPageController@renderUser');
Route::get('/manageProduct','AdminPageController@renderProduct');
Route::get('/db',function(){
    $user=DB::table('users')->get();
    $user2=DB::select('select*from users');
    info($user2);
    //info($user);
});