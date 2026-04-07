<?php

namespace App\Actions;

use App\Models\User;

class BlockUserAction
{
    public static function execute(User $user)
    {
        $user->update(['is_blocked' => !$user->is_blocked]);
    }
}
