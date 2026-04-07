<?php

namespace App\Actions;

use App\Models\Book;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ReturnBookAction
{
    public static function execute(Book $book) {
        if (!request()->user()->RentedBooks()->where('book_id', $book->id)->exists()) {
            throw new NotFoundHttpException("Rent record not found");
        }

        DB::transaction(function () use ($book) {
            request()->user()->RentedBooks()->detach($book->id);
            $book->increment('available_copies');
        });

        return $book;
    }
}
