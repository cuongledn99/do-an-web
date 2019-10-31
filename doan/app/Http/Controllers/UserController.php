<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function getRoles(){
        $roles=DB::table('users')
        ->select(DB::raw('distinct role'))
        ->get();
        return $roles;
    }
    public function getUserInfo($id){
        $user=DB::table('users')
        ->where('id',$id)
        ->get();
        
       return $user;
    }

    public function updateUser($id){
        DB::table('users')
        ->where('id',$id)
        ->update(['address'=>'test','email'=>'mail']);
    }
}
