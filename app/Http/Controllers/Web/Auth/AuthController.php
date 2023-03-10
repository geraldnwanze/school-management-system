<?php

namespace App\Http\Controllers\Web\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $username = $request->username;
        $loginType = filter_var($username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        $request->merge([ //adding the login type whether username or email to request array
            $loginType => $username
        ]);

        if(Auth::attempt($request->only($loginType, 'password'))){
            $request->session()->regenerate();
            return redirect()->route('dashboard.'.Auth::user()->role.'.index');            
        }

        return back()->with('error', 'Invalid credentials provided')->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();
 
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
     
        return redirect()->route('auth.login-page');
    }
    
}
