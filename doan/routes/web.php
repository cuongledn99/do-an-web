<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use App\Utils\UrlUtil;
use Illuminate\Support\Facades\Route;

/**
 * middleware auth for admin routes
 */
Route::group(['middleware' => ['MyAuth']], function () {
    Route::prefix('admin')->group(function () {
        Route::get('','AdminPageController@renderAdminPage');
        Route::get('manageStaff','AdminPageController@renderStaff');
        Route::get('manageUser','AdminPageController@renderUser');
        Route::get('manageProduct','AdminPageController@renderProduct')->name('manageProduct');
    });
 });

/**
 * login page
 */
Route::get('admin/login', "AdminPageController@loginPage");
Route::post('/loginAdmin','AuthController@login');


//test send email
Route::get('/sendemail','SendEmailController@index');
Route::post('/sendemail/send','SendEmailController@send');