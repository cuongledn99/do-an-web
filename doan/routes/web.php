<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use App\Utils\UrlUtil;
use Illuminate\Support\Facades\Route;

Route::get('/', 'Pages\\NonAuths\\HomeController@index');

Route::group(['middleware' => ['MyAuth']], function () {
    Route::prefix('admin')->group(function () {
        Route::get('','AdminPageController@renderAdminPage');
        Route::get('manageStaff','AdminPageController@renderStaff');
        Route::get('manageUser','AdminPageController@renderUser');
        Route::get('manageProduct','AdminPageController@renderProduct')->name('manageProduct');
    });
 });

Route::get('admin/login', "AdminPageController@loginPage");
Route::get('/loginAdmin','Login@login');
Route::post('/loginAdmin','Login@login');

// Route::resource('shoes','AdminPageController');

//test send email
Route::get('/sendemail','SendEmailController@index');
Route::post('/sendemail/send','SendEmailController@send');