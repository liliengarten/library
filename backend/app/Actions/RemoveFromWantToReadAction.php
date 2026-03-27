<?php
namespace App\Actions;

use App\Models\Book;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RemoveFromWantToReadAction {
    public static function execute(int $id) {
        $book = Book::find($id);

        if ($book) {
            DB::table('want_to_read')->where('user_id', Auth::user()->id)->where('book_id', $id)->delete();
        }

        return $book;
    }
}
