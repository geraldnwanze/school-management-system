<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $userType = $request->user_type;
        if($userType != ''){
            //user type of 1 is teacher
            if($userType == 1){

            }else{ // student

            }
        }else{
            // login while checking where user type is null
        }
    }

    public function forgotPwd()
    {

    }

    public function resetPwd()
    {
        
    }
    
}
