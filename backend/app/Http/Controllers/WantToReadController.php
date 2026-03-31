<?php

namespace App\Http\Controllers;

use App\Actions\AddToWantToReadAction;
use App\Actions\RemoveFromWantToReadAction;
use App\Http\Resources\PaginationResource;
use App\Models\WantToRead;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WantToReadController extends Controller
{
    public function index() {
        $data = WantToRead::where('user_id', Auth::user()->id)->paginate(10);
        return response()->json(new PaginationResource($data), 200);
    }

    public function add(AddToWantToReadAction $action, int $id) {
        $result = $action->execute($id);

        if ($result[0] && !$result[1]) {
            return response()->json([
                "message" => "Success",
                "book" => $result[0]
            ], 201);
        } else if ($result[1]) {
            return response()->json(['message' => 'Book is already in list'], 409);
        } else {
            return response()->json(["error" => "Book not found"], 404);
        }
    }

    public function remove(RemoveFromWantToReadAction $action, int $id) {
        $book = $action->execute($id);

        if ($book) {
            return response()->json([
                "message" => "Success",
                "book" => $book
            ], 200);
        } else {
            return response()->json(["error" => "Book not found"], 404);
        }
    }
}
