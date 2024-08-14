<?php

namespace App\Http\Controllers;

use App\Http\Requests\Api\Auth\LoginRequest;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $credentials = $request->only(['email', 'password']);
        $token = Auth::attempt($credentials);
        if (!$token) {
            return response()->json([
                "message" => __("validation.invalid_email_or_password")
            ], 401);
        }

        return response()->json([
            "message" => __("login_success"),
            "user" => new UserResource(Auth::user()),
            "token" => $token
        ]);
    }

    public function me()
    {
        return response()->json([
            "user" => new UserResource(Auth::user()),
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return response()->json([
            "message" => __("logout_success"),
        ]);
    }

    public function refresh()
    {
        return response()->json([
            "admin" => new UserResource(Auth::user()),
            "token" => Auth::refresh()
        ]);
    }
}
