<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Providers\shoes;
use Illuminate\Support\Facades\Auth;

class AdminPageController extends Controller
{
    public function renderAdminPage(){
        return view('adminpage.index');
    }
    public function loginPage(){
        if (Auth::check()) {
            return redirect('admin'); 
        }else{
            return view('adminpage.loginadmin');
        }
    }
    public function renderStaff(){
        $users=DB::select('select * from users where role in ("admin","staff")');
        return view('adminpage.staffManagement',['users'=>$users]);
    }
    public function renderCategory(){
        $category=DB::table('category')
                    ->get();
                    return view('adminpage.categoryManagement',['category'=>$category]);
    }
    public function renderUser(){
        $users=DB::table('users')
                    ->where('role','customer')
                    ->get();

        return view('adminpage.userManagement',['users'=>$users]);
    }
    public function renderProduct(){
        $shoes=DB::table('shoes')
                                 ->join('category', 'shoes.categoryID', '=', 'category.id')
                                 ->select('shoes.id','shoes.name','category.categoryName','shoes.inStock')
                                 ->get();
        $category=DB::table('category')
                                ->get();
        return view('adminpage.ProductManagement',['shoes'=>$shoes],['category'=>$category]);
    }
    public function renderBill(){
        $bills=DB::table('bill')
                                //  ->join('category', 'shoes.categoryID', '=', 'category.id')
                                //  ->select('shoes.id','shoes.name','category.categoryName','shoes.inStock')
                                 ->get();
        // $category=DB::table('category')
        //                         ->get();
        return view('adminpage.bill',['bills'=>$bills]);
    }
    public function getProductInfoByID($productID){
        $result=$bills=DB::table('bill')
        ->get();
        return $result;
    }
    public function getBillDetail($billID){
        $result=DB::table('bill_detail')
        // ->join('shoes', 'shoes.id', '=', 'bill_detail.shoesID')
        // ->select('bill_detail.id','shoes.name','bill_detail.customerEmail','bill_detail.customerPhone','bill_detail.customerAddress','bill_detail.totalValue')
        ->where('billID',$billID )
        ->get();
        return $result;
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
}
