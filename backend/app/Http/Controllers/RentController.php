<?php

namespace App\Http\Controllers;

use App\Actions\RentBookAction;
use App\Actions\ReturnBookAction;
use App\Http\Resources\PaginationResource;
use App\Models\Book;

class RentController extends Controller
{
    public function index() {
        return response()->json(new PaginationResource(request()->user()->rentedBooks()->paginate(10)));
    }

    public function history()
    {
        return response()->json(new PaginationResource(request()->user()->rentHistory()->paginate(10)));
    }

    public function add(Book $book)
    {
        $book = RentBookAction::execute($book);

        return response()->json([
            "message" => "Success",
            "book" => $book
        ], 201);
    }

    public function remove(Book $book)
    {
        $book = ReturnBookAction::execute($book);

        return response()->json([
            "message" => "Book returned successfully",
            "book" => $book
        ]);
    }
}
