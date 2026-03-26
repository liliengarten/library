<?php
namespace App\Actions;

use App\Models\Book;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AddToWantToReadAction {
    public static function execute(string $id) {
        $book = Book::find($id);

        if ($book) {
            DB::table('want_to_read')->create([
                'book_id' => $id,
                'user_id' => Auth::id()
            ]);
        }

        return $book;
    }
}
