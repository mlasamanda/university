<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('master.admin.homeDashboard');
    }
    public function profile(Request $request){
        $userRegno = $request->session()->get('user_regno');
        //$userMobile=$request->session()->get('user_mobileno');
        return view('master.admin.users.adminProfile',compact('userRegno'));
    }
}
