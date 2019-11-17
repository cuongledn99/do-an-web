<?php

use Illuminate\Http\Request;
use App\Utils\UploadFile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\Environment\Console;
use Symfony\Component\Console\Input\Input;


/**
 * adminpage api
 */
Route::get('user/allRoles','UserController@getRoles');
Route::get('/user/{id}','UserController@getUserInfo');
Route::post('/user/{id}','UserController@updateUser');

Route::get('/user1/{userid}','UserController@getUserInfo1');
Route::get('/cate/{cateid}','CategoryController@getCateInfor');
Route::get('/product/{ProductID}','ProductController@getProductInfo');
Route::post('/product/{ProductID}','ProductController@updateProduct');
// Route::get('user/allRoles','UserController@getRoles');

//delete
Route::delete('admin/staff/{id}','UserController@deleteUser');
//delete user
Route::delete('admin/user/{id}','UserController@deleteUser1');
//delete product
Route::delete('admin/product/{id}','ProductController@deleteProduct');

//delete category
Route::delete('admin/cate/{id}','CategoryController@deleteCate');

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

//add cate
Route::post('admin/addcate',function(Request $request){
    $categoryusernameadd=$request->input('categorynameAdd');
    $created_atCateAdd=now();
    $updated_atCateAdd=now();
    $CateAdd=[
        'categoryName'=>$categoryusernameadd,
        'created_at'=>$created_atCateAdd,
        'updated_at'=>$updated_atCateAdd
    ];
    DB::table('category')->insert(
        $CateAdd
    );
    return redirect('/admin/category');


});


//add staff
Route::post('admin/addstaff', function (Request $request) {
    

    $staffusernameadd = $request->input('staffusernameAdd');
    $stafffullnameadd = $request->input('stafffullnameAdd');
    $ArrayUsername= DB::table('users')
                    ->select('username')
                    ->get();
 
  
    // info(array_search($staffusernameadd,$ArrayUsername));
    $staffpasswordadd = $request->input('staffpasswordAdd');
    $hashPassword = Hash::make($staffpasswordadd);
    $staffaddressadd = $request->input('staffaddressAdd'); //
    $staffemailadd = $request->input('staffemailAdd'); //
    $staffdobadd = $request->input('staffdobAdd'); //
    $created_atStaffAdd = now();
    $updated_atStaffAdd = now();
    $staffroleAdd = $request->get('rolestaff');
    // info($request->has('staffaddressAdd'));
    // info(empty($staffaddressadd));
    $insertValues=
    [
        'username' => $staffusernameadd,
        'fullname' => $stafffullnameadd,
        'password' => $hashPassword,
        'role' => $staffroleAdd,
        'created_at' => $created_atStaffAdd,
        'updated_at' => $updated_atStaffAdd,
    ];

    // insert image if available
    if ($request->hasFile('imagestaffAdd')) {
        $imageStaffAdd = $request->file('imagestaffAdd');
        $newURLStaffAdd = UploadFile::uploadFile('upload', $imageStaffAdd);
        $insertValues['image'] = $newURLStaffAdd;
    }

    // insert address if not null
    if(empty($staffaddressadd)!=1)
    {
        $insertValues['address']=$staffaddressadd;
    }

    // insert email if not null
    if(empty($staffemailadd)!=1)
    {
        $insertValues['email']=$staffemailadd;
    }

    // insert dob if not null
    if(empty($staffdobadd)!=1) {
        $insertValues['dob'] = $staffdobadd;
    }

    DB::table('users')->insert(
        $insertValues
    );

    // if ($request->hasFile('imagestaffAdd')) {
    //     $imageStaffAdd = $request->file('imagestaffAdd');
    //     $newURLStaffAdd = UploadFile::uploadFile('upload', $imageStaffAdd);
    //     DB::table('users')->insert(
    //         [
    //             'username' => $staffusernameadd,
    //             'fullname' => $stafffullnameadd,
    //             'password' => $hashPassword,
    //             'address' => $staffaddressadd,
    //             'email' => $staffemailadd,
    //             'role' => $staffroleAdd,
    //             'dob' => $staffdobadd,
    //             'image' => $newURLStaffAdd,
    //             'created_at' => $created_atStaffAdd,
    //             'updated_at' => $updated_atStaffAdd,
    //         ]
    //     );
    // } else {
    //     DB::table('users')->insert(
    //         [
    //                     'username'=>$staffusernameadd,
    //                     'fullname'=>$stafffullnameadd,
    //                     'password'=>$hashPassword,
    //                     'address'=>$staffaddressadd,
    //                     'email'=>$staffemailadd,
    //                     'dob'=>$staffdobadd,
    //                     'role'=>$staffroleAdd,
    //                     // 'email'=>$newURLStaffAdd,
    //                     'created_at'=>$created_atStaffAdd,
    //                     'updated_at'=>$updated_atStaffAdd,
    //             ]);
    //     }

        return redirect('/admin/manageStaff');
});
//update staff
Route::post('admin/user',function(Request $request){
    $staffIdUpdate=$request->input('staffid');
    $staffUsernameUpdate=$request->input('staffusername');
    $staffaddress=$request->input('staffaddress');
    $stafffullname=$request->input('stafffullname');
    // $staffpassword=$request->input('staffpassword');
    $staffemail=$request->input('staffemail');
    $staffdob=$request->input('staffdob');
    $staffrole=$request->get('staffrole');
    $newURLstaff=$request->hasFile('imagestaff');
    $staffUpdatedat=now();
    if($newURLstaff){

        $newURLimagestaff=$request->file('imagestaff');
        $URLimagestaff=UploadFile::uploadFile('upload',$newURLimagestaff);
        DB::table('users')
            ->where('id', $staffIdUpdate)
            ->update(
                [
                    'username' => $staffUsernameUpdate,
                    'address' => $staffaddress,
                    // 'password' => $staffpassword,
                    'email' => $staffemail,
                    'dob' => $staffdob,
                    'role' => $staffrole,
                    'fullname' => $stafffullname,
                    'image' => $URLimagestaff,
                    'updated_at'=>$staffUpdatedat
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
                        // 'password'=>$staffpassword,
                        'email'=>$staffemail,
                        'dob'=>$staffdob,
                        'role'=>$staffrole,
                        'fullname'=>$stafffullname,
                        // 'image'=>$URLimagestaff,
                    ] );
    }

    return redirect('/admin/manageStaff');

});

//update cate
Route::post('admin/cate',function(Request $request){
    $cateIdUpdate=$request->input('cateid');
    $CateNameUpdate=$request->input('catename');
    $cateUpdated=now();
    DB::table('category')->where('id',$cateIdUpdate)
    ->update(
        [
            'categoryName' => $CateNameUpdate,
            'updated_at'=>$cateUpdated
        ]);
            
    return redirect('/admin/category');


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
    // $passwordUpdate=$request->input('password');
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
                    // 'password' => $passwordUpdate,
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
                // 'password' => $passwordUpdate,
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
    $hashPasswordCustomer=Hash::make($password);
    $address=$request->input('address');//
    $email=$request->input('email');//
    $dob=$request->input('dob');//
    $created_at=now();
    $updated_at=now();
    $role='customer';
    $UserArray=[
        'username'=>$username,
        'fullname'=>$fullname,
        'password'=>$hashPasswordCustomer,
        'created_at'=>$created_at,
        'updated_at'=>$updated_at,
        'role'=>$role
    ];
    if(empty($address)!=1){
        $UserArray['address']=$address;

    }
    if(empty($email)!=1)
    {
        $UserArray['email'] = $email;
    }
    if(empty($dob)!=1){
        $UserArray['dob']=$dob;
    }
    DB::table('users')->insert(
        $UserArray
    );


    // $newImageUrlUser='';
    // if($request->hasFile('imageuser')){
    //     // info('test if has file Image User');
    //     $imageuser = $request->file('imageuser');
    //     //return back()->with('success','Image Upload successfully');
    //     $newImageUrlUser= UploadFile::uploadFile('upload',$imageuser);
    //     DB::table('users')->insert(
    //             [
    //                 'username'=>$username,
    //                 'fullname'=>$fullname,
    //                 'password'=>$hashPasswordCustomer,
    //                 'address'=>$address,
    //                 'email'=>$email,
    //                 'role'=>$role,
    //                 'dob'=>$dob,
    //                 'created_at'=>$created_at,
    //                 'updated_at'=>$updated_at,
    //                 'image'=>$newImageUrlUser,
    //             ]);
    // }
    // else{
    // DB::table('users')->insert(
    //     [
    //         'username'=>$username,
    //         'fullname'=>$fullname,
    //         'password'=>$hashPasswordCustomer,
    //         'address'=>$address,
    //         'email'=>$email,
    //         'role'=>$role,
    //         'dob'=>$dob,
    //         'created_at'=>$created_at,
    //         'updated_at'=>$updated_at,
    //         // 'image'=>$newImageURL,
    //     ]);
    // }
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

// check user da ton tai hay chua
// neu da ton tai -> return true
// else return false
Route::get('/validateUser/{inputUsername}',function($inputUsername){
 $data=   DB::table('users')
    ->where('username',$inputUsername)
    ->count();
    return $data;
});

//validateCategoryName
Route::get('/validateCatename/{inputCateName}',function($inputCateName){
    $countCateName=DB::table('category')
        ->where('categoryName',$inputCateName)
        ->count();
        return $countCateName;
});


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

