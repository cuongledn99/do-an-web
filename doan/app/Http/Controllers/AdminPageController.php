<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminPageController extends Controller
{
    public function renderAdminPage(){
                return view('adminpage.index');
    }
    public function renderStaff(){
        $users=DB::table('users')->get()->where('role','admin');
        return view('adminpage.staffManagement',['users'=>$users]);
    }
    public function renderUser(){
        return view('adminpage.UserManagement');
    }
    public function renderProduct(){
        $shoes=DB::table('shoes')
                                 ->join('category', 'shoes.categoryID', '=', 'category.id')
                                 ->select('shoes.id','shoes.name','category.categoryName','shoes.inStock')
                                 ->get();
        return view('adminpage.ProductManagement',['shoes'=>$shoes]);
    }
    public function deleteUser($id){
        DB::table('users')
            ->where('id', '=', $id)
            ->delete();

        return 1;
    }
    public function deleteProduct($id){
        DB::table('shoes')
            ->where('id', '=', $id)
            ->delete();

        return 1;
    }
}
