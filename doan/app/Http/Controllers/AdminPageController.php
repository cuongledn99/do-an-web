<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Providers\shoes;

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
        $shoes=DB::table('shoes')
                                 ->join('category', 'shoes.categoryID', '=', 'category.id')
                                 ->select('shoes.id','shoes.name','category.categoryName','shoes.inStock')
                                 ->get();
        return view('adminpage.ProductManagement',['shoes'=>$shoes]);
    }
    public function deleteUser($id){
        DB::table('users')
            ->where('id', '=', $id)
            ->delete();

        return 1;
    }
    public function deleteProduct($id){
        DB::table('shoes')
            ->where('id', '=', $id)
            ->delete();

        return 1;
    }
    public function index(){

    }
    public function create(){

        return view('adminpage.ProductManagement');
    }




    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'name' => 'required',
                'description' => 'required',
                'categoryid'=>'required',
                'image'=>'required',
                'inprice'=>'required',
                'outprice'=>'required',
                'instock'=>'required',
                'created_at'=>'required',
                'updated_at'=>'required'
            ]
        );
        
        $shoes = new shoes([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'categoryid' => $request->get('categoryid'),
            'image' => $request->get('image'),
            'inprice' => $request->get('inprice'),
            'outprice' => $request->get('outprice'),
            'instock' => $request->get('instock'),
            'created_at' => $request->get('created_at'),
            'updated_at' => $request->get('updated_at')

        ]);
        $shoes->save();
        return redirect()->route('manageProduct')->with('success','data added');
    }
}
