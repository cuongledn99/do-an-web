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
        return view('adminpage.ProductManagement');
    }
}
