<?php

namespace App\Http\Controllers;

use App\Actions\BlockUserAction;
use App\Http\Resources\PaginationResource;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $data = User::paginate(10);
        return response()->json(new PaginationResource($data), 200);
    }

    public function block(BlockUserAction $action, int $id)
    {
        if ($id == Auth::user()->id) {
            return response()->json([
                "message" => "Can't block yourself",
            ], 403);
        }

        $user = $action->execute($id);

        if ($user->is_blocked) {
            return response()->json([
                "message" => "User has been blocked",
                "user" => $user
            ], 200);
        } else if (!$user->is_blocked) {
            return response()->json([
                "message" => "User has been unblocked",
                "user" => $user
            ], 200);
        }

        return response()->json([
            "message" => "User not found",
        ], 404);
    }
}
