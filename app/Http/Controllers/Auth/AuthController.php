<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Auth\LoginRequest;

class AuthController extends Controller
{
    public function login()
    {
         return view('admin.auth.login');
    }
 
    public function doLogin(LoginRequest $request)
    {
        $request->authenticate();
 
        $request->session()->regenerate();
 
        return redirect()->intended(route('admin.dashboard', absolute: false));
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
 }