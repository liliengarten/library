<?php

namespace App\Actions;

use App\Models\Book;

class UpdateBookAction
{
    public static function execute(array $data, Book $book) {
        $book->update($data);
    }
}
