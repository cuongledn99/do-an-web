<?php

use Illuminate\Http\Request;
use App\Utils\UploadFile;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Console\Input\Input;


/**
 * adminpage api
 */
Route::get('user/allRoles','UserController@getRoles');
Route::get('/user/{id}','UserController@getUserInfo');
Route::post('/user/{id}','UserController@updateUser');

Route::get('/user1/{userid}','UserController@getUserInfo1');
Route::get('/product/{ProductID}','ProductController@getProductInfo');
Route::post('/product/{ProductID}','ProductController@updateProduct');
// Route::get('user/allRoles','UserController@getRoles');

//delete
Route::delete('admin/staff/{id}','UserController@deleteUser');
//delete user
Route::delete('admin/user/{id}','UserController@deleteUser1');
//delete product
Route::delete('admin/product/{id}','ProductController@deleteProduct');

Route::post('admin/updateUser',function(Request $request){
    $userid=$request->input('UserID');
    $username=$request->input('username');
    $password=$request->input('password');
    $fullname=$request->input('fullname');
    $address=$request->input('address');
    $email=$request->input('email');
    $dob=$request->input('dob');
    $newImageURLUserUpdate=$request->hasFile('imageUser');
    if($newImageURLUserUpdate){
        $imageUserUpdate=$request->file('imageUser');
        $newImageURLUserUpdate=UploadFile::uploadFile('upload',$imageUserUpdate);
        DB::table('users')
            ->where('id',$userid)
            ->update(
                [
                    'username'=>$username,
                    'password'=>$password,
                    'fullname'=>$fullname,
                    'address'=>$address,
                    'email'=>$email,
                    'dob'=>$dob,
                    'image'=>$newImageURLUserUpdate
                ]);
    }
    DB::table('users')
            ->where('id',$userid)
            ->update(
                [
                    'username'=>$username,
                    'password'=>$password,
                    'fullname'=>$fullname,
                    'address'=>$address,
                    'email'=>$email,
                    'dob'=>$dob,
                    // 'image'=>$newImageURLUserUpdate
                ]);
                return redirect('/admin/manageUser');
});


//update staff
Route::post('admin/user',function(Request $request){
    $staffIdUpdate=$request->input('staffid');
    $staffUsernameUpdate=$request->input('staffusername');
    $staffaddress=$request->input('staffaddress');
    $stafffullname=$request->input('stafffullname');
    $staffpassword=$request->input('staffpassword');
    $staffemail=$request->input('staffemail');
    $staffdob=$request->input('staffdob');
    $staffrole=$request->get('staffrole');
    $newURLstaff=$request->hasFile('imagestaff');
    if($newURLstaff){

        $newURLimagestaff=$request->file('imagestaff');
        $URLimagestaff=UploadFile::uploadFile('upload',$newURLimagestaff);
        DB::table('users')
            ->where('id', $staffIdUpdate)
            ->update(
                [
                    'username' => $staffUsernameUpdate,
                    'address' => $staffaddress,
                    'password' => $staffpassword,
                    'email' => $staffemail,
                    'dob' => $staffdob,
                    'role' => $staffrole,
                    'fullname' => $stafffullname,
                    'image' => $URLimagestaff,
                ]
            );
    }
    else {
        DB::table('users')
            ->where('id',$staffIdUpdate)
            ->update(
                    [
                        'username'=>$staffUsernameUpdate,
                        'address'=>$staffaddress,
                        'password'=>$staffpassword,
                        'email'=>$staffemail,
                        'dob'=>$staffdob,
                        'role'=>$staffrole,
                        'fullname'=>$stafffullname,
                        // 'image'=>$URLimagestaff,
                    ] );
    }

    return redirect('/admin/manageStaff');

});


//update product
Route::post('admin/updateProduct',function(Request $request){
    $ProductIdUpdate=$request->input('ProductID');
    $ProductNameUpdate=$request->input('ProductName');
    $ProDescription=$request->input('ProductDescription');
    $categoryid=$request->get('categoryid');
    $inprice=$request->input('inprice');
    $outprice=$request->input('outprice');
    $instock=$request->input('instock');
    // $createdat=$request->input('createdat');
    // $updatedat=$request->input('updatedat');
    $newImageURLUpdate=$request->hasFile('image2');
    if ($newImageURLUpdate) {
        // info('hello');
        $imageUpdate = $request->file('image2');
        $newImageURLUpdate = UploadFile::uploadFile('upload', $imageUpdate);
        DB::table('shoes')
        ->where('id', $ProductIdUpdate)
        ->update([
            'name' => $ProductNameUpdate,
            'description' => $ProDescription,
            'categoryid' => $categoryid,
            'inPrice' => (float) $inprice,
            'outPrice' => (float) $outprice,
            'inStock' => (int) $instock,
            // 'created_at' => $createdat,
            'updated_at' => now(),
            'image' => $newImageURLUpdate,
        ]);
    }
    // info($ProductIdUpdate);
    DB::table('shoes')
        ->where('id', $ProductIdUpdate)
        ->update([
            'name' => $ProductNameUpdate,
            'description' => $ProDescription,
            'categoryid' => $categoryid,
            'inPrice' => (float) $inprice,
            'outPrice' => (float) $outprice,
            'inStock' => (int) $instock,
            // 'created_at' => $createdat,
            'updated_at' => now(),
            // 'image' => $newImageURLUpdate,
        ]);
    return redirect('/admin/manageProduct');

});

//update user
Route::post('admin/updateUser',function(Request $request){
    $usernameUpdate=$request->input('username');
    $idUser=$request->input('UserID');
    $passwordUpdate=$request->input('password');
    $fullnameUpdate=$request->input('fullname');
    $addressUpdate=$request->input('address');
    $emailUpdate=$request->input('email');
    $dobUpdate=$request->input('dob1');
    $newImageURLUserUpdate=$request->hasFile('imageUser');
    if ($newImageURLUserUpdate) {
        $imageUserUpdate = $request->file('imageUser');
        $newURL = UploadFile::uploadFile('upload', $imageUserUpdate);
        DB::table('users')
            ->where('id', $idUser)
            ->update(
                [
                    'username' => $usernameUpdate,
                    'password' => $passwordUpdate,
                    'fullname' => $fullnameUpdate,
                    'address' => $addressUpdate,
                    'email' => $emailUpdate,
                    'dob' => $dobUpdate,
                    'image' => $newURL,
                    'updated_at'=>now(),
                ]
            );
    }
    else{
        DB::table('users')
        ->where('id', $idUser)
        ->update(
            [
                'username' => $usernameUpdate,
                'password' => $passwordUpdate,
                'fullname' => $fullnameUpdate,
                'address' => $addressUpdate,
                'email' => $emailUpdate,
                'dob' => $dobUpdate,
                // 'image' => $newURL,
                'updated_at'=>now(),
            ]
        );
    }
    return redirect('/admin/manageUser');

});

//add user
Route::post('admin/user1',function(Request $request){
    $username=$request->input('username');
    $fullname=$request->input('fullname');
    $password=$request->input('password');
    $address=$request->input('address');
    $email=$request->input('email');
    $dob=$request->input('dob');
    $created_at=now();
    $updated_at=now();
    $role='customer';
    $newImageUrlUser='';
    if($request->hasFile('imageuser')){
        // info('test if has file Image User');
        $imageuser = $request->file('imageuser');
        //return back()->with('success','Image Upload successfully');
        $newImageUrlUser= UploadFile::uploadFile('upload',$imageuser);
        DB::table('users')->insert(
                [
                    'username'=>$username,
                    'fullname'=>$fullname,
                    'password'=>$password,
                    'address'=>$address,
                    'email'=>$email,
                    'role'=>$role,
                    'dob'=>$dob,
                    'created_at'=>$created_at,
                    'updated_at'=>$updated_at,
                    'image'=>$newImageUrlUser,
                ]);
    }
    else{
    DB::table('users')->insert(
        [
            'username'=>$username,
            'fullname'=>$fullname,
            'password'=>$password,
            'address'=>$address,
            'email'=>$email,
            'role'=>$role,
            'dob'=>$dob,
            'created_at'=>$created_at,
            'updated_at'=>$updated_at,
            // 'image'=>$newImageURL,
        ]);
    }
    return redirect('/admin/manageUser');
});

//add product
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

