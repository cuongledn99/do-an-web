<?php

use App\Utils\UrlUtil;
use Illuminate\Support\Facades\Route;

Route::get('/', 'Pages\\NonAuths\\HomeController@index');


Route::get('/admin','AdminPageController@renderAdminPage');
Route::get('/admin/manageStaff','AdminPageController@renderStaff');
Route::get('admin/manageUser','AdminPageController@renderUser');
Route::get('admin/manageProduct','AdminPageController@renderProduct')->name('manageProduct');
// Route::resource('shoes','AdminPageController');

//test send email
Route::get('/sendemail','SendEmailController@index');
Route::post('/sendemail/send','SendEmailController@send');