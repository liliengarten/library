<?php
namespace App\Actions;

use App\Models\Book;

class RemoveBookAction {
    public static function execute(Book $book) {
        $book->delete();
    }
}
