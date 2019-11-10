<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
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
        $data=DB::table('shoes')->simplePaginate(10);
        // $shoes=json_encode($shoes);
        // info($shoes);
        return view('homepage.index',['data'=>$data]);
        // return $shoes;
    }
}
