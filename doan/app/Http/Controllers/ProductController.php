<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Utils\UploadFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    // confirm delete user
    public function deleteProduct($id){
        
        
        DB::table('bill_detail')
        -> where('shoesID','=',$id)
        ->delete();
        DB::table('shoes')
        -> where('id','=',$id)
        ->delete();
        return 1;

    }
}