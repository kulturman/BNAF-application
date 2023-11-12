<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\AppBaseController;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class AuthController extends AppBaseController
{
    use AuthenticatesUsers;

    public function sendLoginResponse(Request $request)
    {
        $authenticatedUser = $this->guard()->user();

        return [
            'token' => $authenticatedUser->createToken('token')->plainTextToken
        ];
    }

    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();

        return [
            'message' => 'Logged out'
        ];
    }
}
