<?php
namespace App\Actions;

use App\Models\Book;

class UpdateBookAction {
    public static function execute(array $data, int $id) {
        $book = Book::find($id);

        if ($book) {
            $book->update(...$data);
            $book->save();
        }

        return $book;
    }
}
