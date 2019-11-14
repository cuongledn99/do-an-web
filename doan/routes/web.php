<?php

use App\Utils\UrlUtil;
use Illuminate\Support\Facades\DB;

Route::get('/', 'HomeController@renderProduct');
Route::get('/test', function () {
    $data = DB::table('shoes')->simplePaginate(12);
    foreach ($data as $item) {
        $item->outPrice = str_replace('.00000', '', $item->outPrice);
        $item->outPrice = $item->outPrice . ' VND';
    }
    return $data;
    // return view('homepage.index', ['data' => $data]);
});



Route::get('/admin','AdminPageController@renderAdminPage');
Route::get('/admin/manageStaff','AdminPageController@renderStaff');
Route::get('admin/manageUser','AdminPageController@renderUser');
Route::get('admin/manageProduct','AdminPageController@renderProduct');

