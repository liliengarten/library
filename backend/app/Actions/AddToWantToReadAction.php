<?php

namespace App\Actions;

use App\Models\Book;
use App\Models\WantToRead;

class AddToWantToReadAction
{
    public static function execute(Book $book)
    {
        WantToRead::Create([
            'book_id' => $book->id,
            'user_id' => request()->user()->id
        ]);
    }
}
