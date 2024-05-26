<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();
            $token = $user->createToken('pass10')->accessToken;
            return response(
                [
                    'token' => $token,
                    'status' => 200,
                ],
                200
            );
        } else {
            return response(
                [
                    'message' => 'Invalid credentials',
                    'status' => 401,
                ],
                401
            );
        }
    }

    public
    function show()
    {

        if (Auth::guard('api')->check()) {
            $user = Auth::guard('api')->user();
            return response(['user' => $user, 'status' => 200,], 200);
        }
        return response(['user' => 'unauthenticated'], 401);
    }

    public
    function logout()
    {
        if (Auth::guard('api')->check()) {
            Auth::guard('api')->user()->token()->revoke();
            return response(['message' => 'Logged out', 'status' => 200,], 200);
        }
        return response(['message' => 'unauthenticated', 'status' => 401,], 401);
    }
}
