<?php
namespace App\Actions;

use App\Models\User;

class BlockUserAction {
    public static function execute(int $id) {
        $user = User::find($id);

        if ($user) {
            $user->update(['is_blocked' => !$user->is_blocked]);
            $user->save();
        }

        return $user;
    }
}
