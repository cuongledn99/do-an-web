<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Laravel\Scout\Searchable;
use App\Models\Shoes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Controllers\Hash;
use Illuminate\Database\Eloquent\Model;
use App\Http\Requests;
use App\User;
use Redirect;
use Validator;
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
    public function RegisterLogin(Request $request){
        $validator=Validator::make($request->all(),
        [
            'username'=>'required|unique:users,username',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:3|max:10',
            'repassword'=>'required|same:password'
        ]);

        if($validator->passes()){
            $users = new User ();
            $users->username = $request->username;
            $users->password = bcrypt($request->password);
       
            $users->email = $request->email;
            $users->role ="customer";
        
            $users->save ();
            return 1;
            // return response()->json(['success'=>'Added new records.']);
        }

      
        return 0;
        // return response()->json(['error'=>$validator->errors()->all()]);
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
        // $credentials = $request->only('username1', 'password1');
        $username=$request->username;
        $password=$request->password;
        
        // info($request->username);
      
        
        if (Auth::attempt(['username'=>$username,'password'=>$password])) {
            return 1;
        }else
        {
            return 0;
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

    //search
    public function getSearch(Request $request)
    {
        $shoes = Shoes::where('name','like','%'.$request->search.'%')
                        ->orWhere('outPrice',$request->search)
                        ->paginate(12);
                      
                        
        return view('partials.search',compact('shoes'));
    
        //     $shoes = Shoes::where('name','like','%'.$request->$search.'%')
        //                     ->orWhere('inPrice',$request->search)
        //                     ->get();	
    
    	
        // return view('partials.search',compact('shoes'));
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

        // return view('homepage.index', compact('data'));
        return view('homepage.index', ['data'=>$data]);

    }
}
