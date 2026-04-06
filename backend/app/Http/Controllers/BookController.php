<?php

namespace App\Http\Controllers;

use App\Actions\AddBookAction;
use App\Actions\RemoveBookAction;
use App\Actions\UpdateBookAction;

use App\Http\Requests\CreateBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Http\Resources\PaginationResource;
use App\Models\Book;

class BookController extends Controller
{
    public function index() {
        return response()->json(new PaginationResource(Book::paginate(10)));
    }

    public function available() {
        return response()->json(new PaginationResource(Book::where('available_copies', '>', 0)->paginate(10)));
    }

    public function add(CreateBookRequest $request) {
        $result = AddBookAction::execute($request->validated());

        return response()->json([
            "message" => "Book added successfully",
            "book" => $result
        ], 201);
    }

    public function update(UpdateBookRequest $request, Book $book) {
        $result = UpdateBookAction::execute($request->validated(), $book);

        return response()->json([
            "message" => "Book updated successfully",
            "book" => $result
        ]);
    }

    public function remove(Book $book) {
        $result = RemoveBookAction::execute($book);

        return response()->json([
            "message" => "Book removed successfully",
            "book" => $result
        ]);
    }
}
