<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Auth\LoginRequest;
use App\Http\Resources\AdminResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $credentials = $request->only(['email', 'password']);
        $token = Auth::guard("admin")->attempt($credentials);
        if (!$token) {
            return response()->json([
                "message" => __("validation.invalid_email_or_password")
            ], 401);
        }

        return response()->json([
            "admin" => new AdminResource(Auth::guard("admin")->user()),
            "token" => $token
        ]);
    }

    public function me()
    {
        return response()->json([
            "admin" => new AdminResource(Auth::guard("admin")->user()),
        ]);
    }

    public function logout()
    {
        Auth::guard("admin")->logout();
        return response()->json([
            "message" => __("successfully_logged_out"),
        ]);
    }

    public function refresh()
    {
        return response()->json([
            "admin" => new AdminResource(Auth::guard("admin")->user()),
            "token" => Auth::guard("admin")->refresh()
        ]);
    }
}
