<?php
namespace App\Actions;

use App\Models\Book;

class RemoveBookAction {
    public static function execute(int $id) {
        $book = Book::find($id);

        if ($book) {
            $book->delete();
        }

        return $book;
    }
}
