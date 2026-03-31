<?php
namespace App\Actions;

use App\Models\Book;

class AddBookAction {
    public static function execute(array $data) {
        return Book::create($data);
    }
}
