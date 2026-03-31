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
            if ($book->available_copies == 0) {
                return [$book, $book->available_copies];
            }

            $result = DB::table('rented_books')->insert([
                'book_id' => $id,
                'user_id' => Auth::id()
            ]);

            DB::table('rent_history')->insert([
                'book_id' => $id,
                'user_id' => Auth::id()
            ]);

            $book->update(['available_copies' => $book->available_copies - 1]);
            $book->save();

            return [$book, !$result];
        }

        return [$book, $already_rented];
    }
}
