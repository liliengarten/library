<?php

namespace App\Http\Controllers;

use App\Actions\BlockUserAction;
use App\Http\Resources\PaginationResource;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        return response()->json(new PaginationResource(User::paginate(10)));
    }

    public function block(User $user)
    {
        if ($user->id == request()->user()->id) {
            return response()->json([
                "message" => "Can't block yourself",
            ], 403);
        }

        BlockUserAction::execute($user);

        if ($user->is_blocked) {
            return response()->json([
                "message" => "User has been blocked",
            ]);
        } else {
            return response()->json([
                "message" => "User has been unblocked",
            ]);
        }
    }
}
