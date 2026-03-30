<?php
namespace App\Actions;

use App\Models\Book;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RentBookAction {
    public static function execute(int $id) {
        $book = Book::find($id);
        $already_rented = DB::table('rented_books')->where('user_id', Auth::user()->id)->where('book_id', $id)->first();

        if ($book && !$already_rented) {
            $result = DB::table('rented_books')->insert([
                'book_id' => $id,
                'user_id' => Auth::id()
            ]);

            return [$book, !$result];
        }

        return [$book, $already_rented];
    }
}
