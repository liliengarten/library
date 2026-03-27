<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function index() {
        return response()->json(DB::table('books')->paginate(10), 200);
    }

    public function available() {
        return response()->json(DB::table('books')->where('available_copies', '>', 0)->paginate(10), 200);
    }
}
