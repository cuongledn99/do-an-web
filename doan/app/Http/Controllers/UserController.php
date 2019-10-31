<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function getUserInfo($id){
        info('get info');
        $user=DB::table('users')
        ->where('id',$id)
        ->get();
        
       return $user;
    }

    public function updateUser($id){
        info('update');
        DB::table('users')
        ->where('id',$id)
        ->update(['address'=>'test','email'=>'mail']);
    }
}
