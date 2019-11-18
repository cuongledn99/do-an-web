<?php

use App\Utils\UrlUtil;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

Route::get('/', 'HomeController@renderProduct');
Route::get('/category/{categoryID}','HomeController@renderProductByCategory');



Route::get('/admin','AdminPageController@renderAdminPage');
Route::get('/admin/manageStaff','AdminPageController@renderStaff');
Route::get('admin/manageUser','AdminPageController@renderUser');
Route::get('/admin/category','AdminPageController@renderCategory');
Route::get('admin/manageProduct','AdminPageController@renderProduct')->name('manageProduct');
// Route::resource('shoes','AdminPageController');

//test send email
Route::get('/sendemail','SendEmailController@index');
Route::post('/sendemail/send','SendEmailController@send');