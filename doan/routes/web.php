<?php

use App\Utils\UrlUtil;
use App\Models\MainProduct;
Route::get("/y",function(){
    // $posts = App\Models\shopProduct::all();
        $posts= MainProduct::where('category_id', '1')
        ->take(5)
        ->get();

        foreach ($posts as $post) {
            echo $post->title. "<br>";
        }
});

Route::get("/yy",function(){
    $countt=shopProduct::chunk(200, function ($posts) {
        foreach ($posts as $post) {
            echo $post->title. "<br>";
        }
        echo "Hết một chunk";
    })->count();;
    echo $countt;
});


Route::get(UrlUtil::home(), 'Pages\\NonAuths\\HomeController@index');
Route::get(UrlUtil::codes(), 'Pages\\NonAuths\CodesController@index');
Route::get(UrlUtil::checkout(), 'Pages\\NonAuths\\CheckOutController@index');
Route::get(UrlUtil::electronic(), 'Pages\\NonAuths\\ElectronicController@index');
Route::get(UrlUtil::mens(), 'Pages\\NonAuths\\MensController@clothing');

Route::group(['prefix'=>UrlUtil::mens()], function(){
    Route::get(UrlUtil::athletic(), 'Pages\\NonAuths\\MensController@athletic');
    Route::get(UrlUtil::sandals(), 'Pages\\NonAuths\\MensController@sandals');
    Route::get(UrlUtil::casual(), 'Pages\\NonAuths\\MensController@casual');
    Route::get(UrlUtil::boots(), 'Pages\\NonAuths\\MensController@boots');
    Route::get(UrlUtil::dress(), 'Pages\\NonAuths\\MensController@dress');
    Route::get(UrlUtil::slippers(), 'Pages\\NonAuths\\MensController@slippers');
    Route::get(UrlUtil::wides(), 'Pages\\NonAuths\\MensController@wides');

});
Route::group(['prefix'=>UrlUtil::womens()], function(){
    Route::get(UrlUtil::athletic(), 'Pages\\NonAuths\\MensController@athletic');
    Route::get(UrlUtil::sandals(), 'Pages\\NonAuths\\MensController@sandals');
    Route::get(UrlUtil::casual(), 'Pages\\NonAuths\\MensController@casual');
    Route::get(UrlUtil::boots(), 'Pages\\NonAuths\\MensController@boots');
    Route::get(UrlUtil::dress(), 'Pages\\NonAuths\\MensController@dress');
    Route::get(UrlUtil::slippers(), 'Pages\\NonAuths\\MensController@slippers');
    Route::get(UrlUtil::wides(), 'Pages\\NonAuths\\MensController@wides');

});
Route::get(UrlUtil::single(), 'Pages\\NonAuths\\SingleController@index');
Route::get(UrlUtil::womens(), 'Pages\\NonAuths\\WomensController@index');
Route::get(UrlUtil::contact(), 'Pages\\NonAuths\\ContactController@index');

// Route::get('/contact', 'Pages\\NonAuths\\ContactController@index');
// Route::get('/contact', function(){
//     return view('contact');
// });

Auth::routes();// câu lệnh sau dòng này cần phải login
Route::get('/home', 'Pages\\Auths\\HomeController@index');

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');
