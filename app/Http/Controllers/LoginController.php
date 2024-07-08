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
            return view('auth.admin-panel');
        }else{
            return redirect()->intended('login');
        }
    }

}
