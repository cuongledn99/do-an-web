<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Controllers\Hash;
use Illuminate\Database\Eloquent\Model;
use App\Http\Requests;
use DB;
use App\Models\User;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function getLogin(){
        return view('partials.login');
    }
    public function postRegister(Request $request) {
        
        // $this->validate($request,
        //     [
        //         'username'=>'required|username|unique:users,username',
        //         'password'=>'required|min:3|max:20',
        //         'Fullname'=>'required',
        //         're_password'=>'required|same:password'
        //     ],
        //     [
        //         'username.required'=>'Vui lòng nhập username',
        //         'username.unique'=>'Username đã có người sữ dụng',
        //         'password.required'=>'Vui lòng nhập mật khẩu',
        //         're_password.same'=>'Mật khẩu không giống nhau',
        //         'password.min'=>'Mật khẩu ít nhất 3 kí tự'
        //     ]);
        $data = $request->all();
        $users = new User ();
        $users->username = $request->get ( 'username' );
        $users->password = bcrypt($request->get('password'));
        $users->address = $request->get ( 'address' );
        $users->email = $request->get ( 'email' );
        $users->role = 0;
        $users->fullname = $request->get ( 'fullname' );
        $users->remember_token = $request->get ( '_token' );
        $users->save ();
        return redirect ( '/' );
        // return redirect ( '/' )->with('thanhcong','Tạo tài khoản thành công');;
    }
    use AuthenticatesUsers;

    public function postLogin(Request $request) {
        // $this->validate($request,
        //     [
        //         'username'=>'required|username',
        //         'password'=>'required|min:3|max:20'
        //     ],
        //     [
        //         'username.required'=>'Vui lòng nhập username',
        //         'password.required'=>'Vui lòng nhập mật khẩu',
        //         'password.min'=>'Mật khẩu ít nhất 3 kí tự',
        //         'password.max'=>'Mật khẩu không quá 20 kí tự'
        //     ]
        // );
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/');
        }else
        {
            return redirect()->intended('/login');
        }
        
        // $credentials = array('username' =>$request->username ,'password' =>$request->password );
        // // echo $req->email ;
        // // echo $req->password ;
        // if(Auth::attempt(['username' => $request->username, 'password' => $request->password])){
        //     // echo 'ok';
        //     $user = Auth::user();

        //     $name = $user->full_name; //or Auth::user()->id;
        //     // $user_email = $user->email; // or Auth::user()->email;
        //     dd($name);

        //     // return redirect()->intended('home');
        //     // return redirect()->back()->with(['flag'=>'success','message'=>'Đăng nhập thành công']);
        // }
    }

    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('homepage.index');
    }

    public function renderProduct()
    {
        $data = DB::table('shoes')->simplePaginate(12);
        foreach ($data as $item) {
            $item->outPrice = str_replace('.00000', '', $item->outPrice);
            $item->outPrice = $item->outPrice . ' VND';
        }
        return view('homepage.index', ['data' => $data]);

        // return view('homepage.index');
    }

    public function renderProductByCategory($categoryID)
    {
        $data = DB::table('shoes')
            ->where('categoryID', $categoryID)
            ->simplePaginate(15);
        foreach ($data as $item) {
            $item->outPrice = str_replace('.00000', '', $item->outPrice);
            $item->outPrice = $item->outPrice . ' VND';
        }

        return view('homepage.index', ['data' => $data]);
    }
}
