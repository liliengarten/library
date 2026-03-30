<?php

namespace App\Http\Controllers;

use App\Actions\CreateUserAction;
use App\Actions\LoginAction;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(CreateUserRequest $request, CreateUserAction $action) {
        $user = $action->execute($request->validated());

        return response()->json($user, 201);
    }

    public function login(LoginRequest $request, LoginAction $action) {
        $token = $action->execute($request->validated());

        if ($token) {
            return response()->json(["token" => $token], 200);
        } else {
            return response()->json(["error" => "Authentication failed"], 401);
        }
    }

    public function logout() {
        if (Auth::check()) {
            Auth::user()->tokens()->delete();
                return response()->json([
                    "message" => "logget out"
            ], 200);
        }
    }
}
