<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {

         return view('dashboard.notice-board');
//        $login=$request->login;
//
//        $password = $request->password;
//        if (Auth::attempt($credentials)) {
//            return redirect()->intended('dashboard');
//        }else{
//            return redirect()->intended('login');
//        }
    }
}
