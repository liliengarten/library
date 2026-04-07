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
        $affectedRows = request()->user()->wantToRead()->where('book_id', $book->id)->detach($book->id);
        if ($affectedRows == 0) {
            throw new NotFoundHttpException();
        }
    }
}
