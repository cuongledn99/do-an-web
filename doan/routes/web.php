<?php

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@renderProduct');
Route::get('/category/{categoryID}', 'HomeController@renderProductByCategory');

Route::get('/admin', 'AdminPageController@renderAdminPage');
Route::get('/admin/manageStaff', 'AdminPageController@renderStaff');
Route::get('admin/manageUser', 'AdminPageController@renderUser');
Route::get('/admin/category', 'AdminPageController@renderCategory');
Route::get('admin/manageProduct', 'AdminPageController@renderProduct')->name('manageProduct');
// Route::resource('shoes','AdminPageController');

//test send email
Route::get('/sendemail', 'SendEmailController@index');
Route::post('/sendemail/send', 'SendEmailController@send');

// test shopping cart
Route::get('cart', function () {
    if (Request::isMethod('post')) {
        $product_id = Request::get('product_id');
        $product = Product::find($product_id);
        Cart::add(array('id' => $product_id, 'name' => $product->name, 'qty' => 1, 'price' => $product->price));
    }
    if (Request::get('product_id') && (Request::get('increment')) == 1) {
        $rowId = Cart::search(array('id' => Request::get('product_id')));
        $item = Cart::get($rowId[0]);

        Cart::update($rowId[0], $item->qty + 1);
    }
    if (Request::get('product_id') && (Request::get('decrease')) == 1) {
        $rowId = Cart::search(array('id' => Request::get('product_id')));
        $item = Cart::get($rowId[0]);

        Cart::update($rowId[0], $item->qty - 1);
    }

    $cart = Cart::content();

    return view('test', array('cart' => $cart, 'title' => 'Welcome', 'description' => '', 'page' => 'home'));
});


Route::get('/test1',function(){
    $ten='asdf';
   
    return view('test1',['data'=>$data]);
});

Route::get('/test2/{id}',function($id){

    return view('test1',['id'=>$id]);
});