<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Login extends Controller
{
    public  function login(Request $request){
        $data = $request->all;
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('admin');
        }
        else {
            return redirect()->intended('admin/login');
        }
    }
}
