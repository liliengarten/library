<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Actions\RentBookAction;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class BookRentController extends Controller
{
    public function index() {
        return response()->json(DB::table('rented_books')->where('user_id', Auth::user()->id)->paginate(10), 200);
    }

    public function add(RentBookAction $action, int $id) {
        $result = $action->execute($id);

        if (!$result[0]) {
            return response()->json([
                "message" => "Book not found"
            ], 404);
        };

        if ($result[0] && $result[1]) {
            return response()->json([
                "message" => "Book is already rented"
            ], 409);
        };

        return response()->json([
            "message" => "Success",
            "book" => $result[0]
        ], 201);
    }
}
