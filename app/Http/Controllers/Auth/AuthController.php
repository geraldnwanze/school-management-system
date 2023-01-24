<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
        
    }

    public function userLogin(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $username = $request->username;
        $pwd = $request->password;
        $loginType = filter_var($username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        // dd($loginType);
        $request->merge([ //adding the login type whether username or email to request array
            $loginType => $username
        ]);

        if(Auth::attempt($request->only($loginType, $pwd))){
            $request->session()->regenerate();

            $role = Auth::user()->userRole();
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
                    return redirect()->back();
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
     
        return redirect('/login');
    }

    public function forgotPwd()
    {

    }

    public function resetPwd()
    {
        
    }
    
}
