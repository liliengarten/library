<?php

use App\Models\Book;

class AddToWantToReadAction {
    public function execute(string $id) {
        $book = Book::findOrfail($id);

        if ($book) {
            DB::table('want_to_read')->create([
                'book_id' => $id,
                'user_id' => Auth::id()
            ]);
        }

        return $book;
    }
}
