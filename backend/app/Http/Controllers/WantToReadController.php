<?php

namespace App\Http\Controllers;

use App\Actions\AddToWantToReadAction;
use App\Actions\RemoveFromWantToReadAction;
use App\Http\Resources\PaginationResource;
use App\Models\Book;

class WantToReadController extends Controller
{
    public function index()
    {
        return response()->json(new PaginationResource(request()->user()->wantToRead()->paginate(10)));
    }

    public function add(Book $book)
    {
        AddToWantToReadAction::execute($book);

        return response()->json([
            "message" => "Success",
            "book" => $book
        ], 201);
    }

    public function remove(Book $book)
    {
        RemoveFromWantToReadAction::execute($book);

        return response()->json([
            "message" => "Success",
            "book" => $book
        ]);
    }
}
