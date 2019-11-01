<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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

    public function updateUser(Request $req,$id){
        
        $username=$req->input(('username'));
        $fullname=$req->input(('fullname'));
        $email=$req->input(('email'));
        $role=$req->input(('role'));
        $dob=$req->input(('dob'));
        $dob=str_replace('-','/',$dob);
        $address=$req->input(('address'));
        $dob=Carbon::parse($dob)->format('Y/m/d');
        
        DB::table('users')
        ->where('id',$id)
        ->update(
            [
                'username'=>$username,
                'fullname'=>$fullname,
                'address'=>$address,
                'email'=>$email,
                'role'=>$role,
                'dob'=>$dob
            ]
        );
        return 1;
    }
}
