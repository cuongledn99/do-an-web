<?php

namespace App\Http\Controllers;

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
        $data = DB::table('shoes')->simplePaginate(12);
        foreach ($data as $item) {
            $item->outPrice = str_replace('.00000', '', $item->outPrice);
            $item->outPrice = $item->outPrice . ' VND';
        }
        return view('homepage.index', ['data' => $data]);
    }
}
