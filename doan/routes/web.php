<?php

use App\Utils\UrlUtil;
use Illuminate\Support\Facades\DB;

Route::get('/', 'HomeController@renderProduct');
Route::get('/category/{categoryID}','HomeController@renderProductByCategory');



Route::get('/admin','AdminPageController@renderAdminPage');
Route::get('/admin/manageStaff','AdminPageController@renderStaff');
Route::get('admin/manageUser','AdminPageController@renderUser');
Route::get('admin/manageProduct','AdminPageController@renderProduct');

