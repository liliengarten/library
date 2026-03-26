<?php

namespace App\Http\Controllers;

use AddToWantToReadAction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WantToReadController extends Controller
{
    public function index() {
        $books = DB::table('want_to_read')->where('user_id', Auth::user()->id)->simplePaginate(10);

        return response()->json($books, 200);
    }

    public function add(AddToWantToReadAction $action, string $id) {
        $book = $action->execute($id);

        if ($book) {
            return response()->json([
                "message" => "Success",
                "book" => $book
            ], 201);
        } else {
            return response()->json(["error" => "Book not found"], 404);
        }
    }
}
