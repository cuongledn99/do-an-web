<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\DB;
use Request;
use Response;
class CartController extends Controller
{
    public function add()
    {
        $product_id = Request::get('product_id');
        $product = DB::table('shoes')->find($product_id);
        Cart::add(array('id' => $product_id, 'name' => $product->name, 'qty' => 1, 'price' => $product->outPrice));
        // $cart = Cart::content();
        $total=Cart::total();
        $count=Cart::count();
       
        $data = (object) [
            'total' => $total,
            'count'=>$count
        ];
        return Response::json($data);
        // return $data;
    }
    public function cart()
    {
        // add new item to cart
        if (Request::isMethod('post')) {
            $product_id = Request::get('product_id');
            $product = DB::table('shoes')->find($product_id);
            Cart::add(array('id' => $product_id, 'name' => $product->name, 'qty' => 1, 'price' => $product->outPrice));
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

        return view('cart', array('cart' => $cart, 'title' => 'Welcome', 'description' => '', 'page' => 'home'));
    }
}
