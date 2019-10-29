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
        $users=DB::select('select * from users where role in ("admin","staff")');
        return view('adminpage.staffManagement',['users'=>$users]);
    }
    public function renderUser(){
        return view('adminpage.UserManagement');
    }
    public function renderProduct(){
        return view('adminpage.ProductManagement');
    }

    public function getUserInfo($id){
        $user=DB::table('users')
        ->where('id',$id)
        ->get();
        
       return $user;
    }
}
