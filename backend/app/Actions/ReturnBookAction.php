<?php

namespace App\Actions;

use App\Models\Book;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ReturnBookAction
{
    public static function execute(Book $book) {
        DB::transaction(function () use ($book) {
            $affectedRows = request()->user()->RentedBooks()->detach($book->id);
            if ($affectedRows == 0) {
                throw new NotFoundHttpException();
            }

            $book->increment('available_copies');
        });

        return $book;
    }
}
