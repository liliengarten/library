<?php

namespace App\Actions;

use App\Exceptions\AlreadyRentedException;
use App\Models\Book;
use App\Models\RentedBook;
use Illuminate\Database\Events\TransactionBeginning;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PHPUnit\Framework\MockObject\Generator\DuplicateMethodException;

class RentBookAction
{
    public static function execute(Book $book)
    {
        if (request()->user()->rentedBooks()->where('book_id', $book->id)->exists()) {
            throw new AlreadyRentedException();
        }


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
