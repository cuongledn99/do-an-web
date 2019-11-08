<?php

use Illuminate\Http\Request;
use App\Utils\UploadFile;

/**
 * adminpage api
 */
Route::get('user/allRoles','UserController@getRoles');
Route::get('/user/{id}','UserController@getUserInfo');
Route::post('/user/{id}','UserController@updateUser');

Route::get('/product/{ProductID}','ProductController@getProductInfo');
Route::post('/product/{ProductID}','ProductController@updateProduct');
// Route::get('user/allRoles','UserController@getRoles');

Route::delete('admin/user/{id}','UserController@deleteUser');
Route::delete('admin/product/{id}','ProductController@deleteProduct');

Route::post('admin/product',function(Request $request){
    
    $name=$request->input('name');
    $description=$request->input('description');
    $categoryid=$request->input('categoryid');
    $inprice=$request->input('inprice');
    $outprice=$request->input('outprice');
    $instock=$request->input('instock');
    $created_at=now();
    $updated_at=now();
    
     
   
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        //return back()->with('success','Image Upload successfully');
        $newImageURL= UploadFile::uploadFile('upload',$image);
        // $updateArr['image'] = $newImageURL;
        DB::table('shoes')->insert([
            [
                'name'=>$name,
                'description'=>$description,
                'categoryID'=>$categoryid,
                'inPrice'=>(float)$inprice,
                'outPrice'=>(float)$outprice,
                'inStock'=>(int)$instock,
                'created_at'=>$created_at,
                'updated_at'=>$updated_at,
                'image'=>$newImageURL,
            ]
        ]);
}
    // xy ly luu xuong db
    return redirect('/admin/manageProduct');
});



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

