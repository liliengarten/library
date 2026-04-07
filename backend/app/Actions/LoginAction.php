<?php
namespace App\Actions;


use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginAction {
    public static function execute(array $data): string {
        if (Auth::attempt($data)) {
            return Auth::user()->createToken('token')->plainTextToken;
        }

        else {
            return "";
        }
    }
}
