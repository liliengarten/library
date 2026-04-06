<?php

namespace App\Actions;

use App\Models\Book;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReturnBookAction
{
    public static function execute(Book $book) {
        DB::transaction(function () use ($book) {
            request()->user()->RentedBooks()->where('book_id', $book->id)->delete();
            $book->increment('available_copies');
        });

        return $book;
    }
}
