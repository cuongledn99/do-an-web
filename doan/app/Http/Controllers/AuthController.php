<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;


class AuthController extends Controller
{
    public function logout()
    {
        Auth::logout();
        return redirect('/admin');  
    }
    use AuthenticatesUsers;

    public  function login(Request $request){
        // $this->validate($request,
        //     [
        //         'username'=>'required|username',
        //         'password'=>'required|min:3|max:30'
        //     ],
        //     [
        //         'username.required'=>'Vui lòng nhập username',
        //         'password.required'=>'Vui lòng nhập mật khẩu',
        //         'password.min'=>'Mật khẩu ít nhất 6 kí tự',
        //         'password.max'=>'Mật khẩu không quá 30 kí tự'
        //     ]
        // );
        $this->validate($request,
            [
                'email'=>'required|email',
                'password'=>'required|min:6|max:20'
            ],
            [
                'email.required'=>'Vui lòng nhập email',
                'email.email'=>'Không đúng định dạng email',
                'password.required'=>'Vui lòng nhập mật khẩu',
                'password.min'=>'Mật khẩu ít nhất 6 kí tự',
                'password.max'=>'Mật khẩu không quá 20 kí tự'
            ]
        );
        $data = $request->all;
        $credentials = $request->only('email', 'password');
        
        if (Auth::attempt($credentials)) {
            return redirect()->intended('admin')->with(['flag'=>'success','message'=>'Đăng nhập thành công']);
        }
        else {
            return redirect()->intended('admin/login')->with(['flag'=>'danger','message'=>'Đăng nhập không thành công']);
        }
    }
}
