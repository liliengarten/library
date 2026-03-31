<?php
namespace App\Actions;

use App\Models\Book;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReturnBookAction {
    public static function execute(int $id) {
        $book = Book::find($id);
        $record = DB::table('rented_books')->where('book_id', $id)->where('user_id', Auth::user()->id)->first();

        if ($record) {
            DB::table('rented_books')->where('book_id', $id)->where('user_id', Auth::user()->id)->delete();

            $book->update(['available_copies' => $book->available_copies + 1]);
            $book->save();
        }

        return $record;
    }
}
