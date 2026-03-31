<?php
namespace App\Actions;

use App\Models\Book;
use App\Models\WantToRead;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AddToWantToReadAction {
    public static function execute(int $id) {
        $book = Book::find($id);
        $record = WantToRead::where('book_id', $id)->where('user_id', Auth::user()->id)->first();

        if ($book && !$record) {
            DB::table('want_to_read')->updateOrInsert([
                'book_id' => $id,
                'user_id' => Auth::id()
            ]);
        }

        return [$book, $record];
    }
}
