<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('admin/product',function(Request $request){
    info ('hello');
    $name=$request->input('name');
    $description=$request->input('description');
    $categoryid=$request->input('categoryid');
    $image=$request->file('image');
    $inprice=$request->input('inprice');
    $outprice=$request->input('outprice');
    $instock=$request->input('instock');
    $created_at=now();
    $updated_at=now();
    DB::table('shoes')->insert([
        [
            'name'=>$name,
            'categoryID'=>$categoryid,
            'inPrice'=>(float)$inprice,
            'outPrice'=>(float)$outprice,
            'inStock'=>(int)$instock,
            'created_at'=>$created_at,
            'image'=>$image
        ]
    ]);
     
   
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $name = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('test');
        $image->move($destinationPath, $name);
        
        return back()->with('success','Image Upload successfully');
    
}
    
    // xy ly luu xuong db
    return redirect('/admin/manageProduct');
});

Route::delete('admin/user/{id}','AdminPageController@deleteUser');


Route::delete('admin/product/{id}','AdminPageController@deleteProduct');
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
