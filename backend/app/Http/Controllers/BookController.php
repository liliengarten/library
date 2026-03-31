<?php

namespace App\Http\Controllers;

use App\Actions\AddBookAction;
use App\Actions\RemoveBookAction;
use App\Actions\UpdateBookAction;

use App\Http\Requests\CreateBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Http\Resources\PaginationResource;
use App\Models\Book;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function index() {
        $data = Book::paginate(10);
        return response()->json(new PaginationResource($data), 200);
    }

    public function available() {
        $data = Book::where('available_copies', '>', 0)->paginate(10);
        return response()->json(new PaginationResource($data), 200);
    }

    public function add(AddBookAction $action, CreateBookRequest $request) {
        $result = $action->execute($request->validated());

        return response()->json([
            "message" => "Book added successfully",
            "book" => $result
        ], 201);
    }

    public function update(UpdateBookAction $action, UpdateBookRequest $request, int $id) {
        $result = $action->execute($request->validated(), $id);

        if ($result) {
            return response()->json([
                "message" => "Book updated successfully",
                "book" => $result
            ], 200);
        } else {
            return response()->json([
                "message" => "Book not found",
            ], 404);
        }
    }

    public function remove(RemoveBookAction $action, int $id) {
        $result = $action->execute($id);

        if ($result) {
            return response()->json([
                "message" => "Book removed successfully",
                "book" => $result
            ], 200);
        } else {
            return response()->json([
                "message" => "Book not found",
            ], 404);
        }    }
}
