<?php
namespace App\Actions;

use App\Models\User;

class CreateUserAction {
    public static function execute(array $data): User {
        return User::create([
            ...$data
        ]);
    }
}
