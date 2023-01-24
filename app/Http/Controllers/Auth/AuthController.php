<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $username = $request->username;
        $password = $request->password;
        $loginType = filter_var($username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        $request->merge([ //adding the login type whether username or email to request array
            $loginType => $username
        ]);

        if(Auth::attempt($request->only($loginType, $password))){
            $request->session()->regenerate();

            $role = Auth::user()->role;
            switch ($role) {
                case $role === User::SUPER_ADMIN:
                    return redirect()->intended('/superadmin/dashboard');
                    break;
                case $role === User::ADMIN:
                    return redirect()->intended('/admin/dashboard');
                    break;
                case $role === User::STAFF:
                    return redirect()->intended('/staff/dashboard');
                    break;
                case $role === User::STUDENT:
                    return redirect()->intended('/student/dashboard');
                    break;
                default:
                    return back()->with('error', 'something went wrong');
                    break;
            }
            
        }

        return back()->with('error', 'Invalid credentials provided');
    }

    public function logout(Request $request)
    {
        Auth::logout();
 
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
     
        return redirect()->route('login');
    }
    
}
