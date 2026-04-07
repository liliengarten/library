<?php

namespace App\Actions;

use App\Models\Book;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class RemoveFromWantToReadAction
{
    public static function execute(Book $book)
    {
        if (!request()->user()->WantToRead()->where('book_id', $book->id)->exists()) {
            throw new NotFoundHttpException("Rent record not found");
        }

        request()->user()->wantToRead()->where('book_id', $book->id)->detach($book->id);
    }
}
