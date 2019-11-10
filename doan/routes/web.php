<?php

use App\Utils\UrlUtil;

Route::get('/', 'HomeController@renderProduct');


Route::get('/admin','AdminPageController@renderAdminPage');
Route::get('/admin/manageStaff','AdminPageController@renderStaff');
Route::get('admin/manageUser','AdminPageController@renderUser');
Route::get('admin/manageProduct','AdminPageController@renderProduct');

