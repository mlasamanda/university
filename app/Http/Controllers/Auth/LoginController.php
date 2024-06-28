<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }
    public function authenticated(Request $request, $user)
    {
//        session([
//            'user_id' => $user->id,
//            'user_regno' => $user->regno,
//            'user_email' => $user->email,
//            // Add any other necessary information
//        ]);
        $request->session()->flash('status', 'You are logged in!');
         $request->session()->put('user_email', $user->email);
        $request->session()->put('user_regno', $user->regno);
        $request->session()->put('userid', $user->id);
        $request->session()->put('user_mobile',$user->mobileno);
         // You can also flash data to the session

        $rolename = $user->roles()->pluck('name');
        if ($rolename->contains('admin')) {
            mail('sayimlasa2021@gmail.com', 'Login Successful', 'Hi Welcome');
            return redirect()->intended(route('admin.profile'));
        } else if ($rolename->contains('student')) {
            return redirect()->intended(route('student.detail'));
        }
        else if ($rolename->contains('hod')) {
            return redirect()->intended(route('hod.index'));
        }
        else if ($rolename->contains('teacher')) {
            return redirect()->intended(route('teacher.index'));
        }
        else{
            return redirect()->intended(route('home'));
        }

    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }


}
