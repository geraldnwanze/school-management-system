<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Traits\ApiResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    use ApiResponses;

    public function login(LoginRequest $request)
    {
        if (!Auth::attempt($request->only('username', 'password'))) {
            return $this->error('', 'Credentials do not match', 401);
        }
        
        $user = User::where('username', $request->username)->first();

        return $this->success([
            'user' => new UserResource($user),
            'token' => $user->createToken('Api Token of ' . $user->username)->plainTextToken
        ], 'login successful');
    }

    public function logout()
    {
        Auth::user()->currentAccessToken()->delete();
        return $this->success(null, 'logout successful');
    }
}
