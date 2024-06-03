<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class StudentDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
         $userEmail = $request->session()->get('user_email');
        $userRegno = $request->session()->get('user_regno');
        // You can also   data to the session
         return view('master.student.studentDetails.index', compact('userRegno','userEmail'));
  }
  }
