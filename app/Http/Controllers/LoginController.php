<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function authenticate(LoginRequest $request)
    {
        $credentials = $request->only('login', 'password');
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            // $url = route('create_post_view');
            // dd($url);
            // return redirect()->route('create_post_view');
            return view('auth/admin-panel');
        }else{
            return redirect()->intended('login');
        }
    }

    public function redirect(){
        dd(21312);
    }
}
