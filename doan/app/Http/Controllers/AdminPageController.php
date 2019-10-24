<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminPageController extends Controller
{
    public function renderAdminPage(){
        return view('adminpage.index');
    }
    public function renderStaff(){
        return view('adminpage.staffManagement');
    }
}
