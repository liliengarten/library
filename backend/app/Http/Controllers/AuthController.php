<?php

namespace App\Http\Controllers;

use App\Actions\CreateUserAction;
use App\Actions\LoginAction;
use App\Actions\LogoutAction;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\LoginRequest;

class AuthController extends Controller
{
    public function register(CreateUserRequest $request) {
        $user = CreateUserAction::execute($request->validated());
        return response()->json($user, 201);
    }

    public function login(LoginRequest $request) {
        $token = LoginAction::execute($request->validated());

        if ($token) {
            return response()->json(["token" => $token]);
        } else {
            return response()->json(["error" => "Authentication failed"], 401);
        }
    }

    public function logout() {
        LogoutAction::execute();
        return response()->json(["message" => "Logged out"]);
    }
}
