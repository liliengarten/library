<?php

namespace App\Http\Controllers;

use App\Actions\RentBookAction;
use App\Actions\ReturnBookAction;
use App\Http\Resources\PaginationResource;
use App\Models\RentedBook;
use App\Models\RentHistory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class BookRentController extends Controller
{
    public function index() {
        $data = RentedBook::where('user_id', Auth::user()->id)->paginate(10);
        return response()->json(new PaginationResource($data), 200);
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

    public function history() {
        $data = RentHistory::where('user_id', Auth::user()->id)->paginate(10);
        return response()->json(new PaginationResource($data), 200);

    }

    public function remove(ReturnBookAction $action, int $id) {
        $result = $action->execute($id);

        if ($result) {
            return response()->json([
                "message" => "Book returned successfully"
            ], 200);
        } else {
            return response()->json([
                "message" => "Rent record not found"
            ]);
        }
    }
}
