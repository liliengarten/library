<?php

namespace App\Actions;

use App\Exceptions\AlreadyRentedException;
use App\Models\Book;
use Illuminate\Support\Facades\DB;

class RentBookAction
{
    public static function execute(Book $book)
    {
        if ($book->available_copies > 0) {
            DB::transaction(function () use ($book) {
                DB::table('rented_books')->insert([
                    'book_id' => $book->id,
                    'user_id' => request()->user()->id,
                ]);

                DB::table('rent_history')->insert([
                    'book_id' => $book->id,
                    'user_id' => request()->user()->id,
                ]);

                $book->decrement('available_copies');
            });
        }

        return $book;
    }
}
