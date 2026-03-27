<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\WantToReadController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::POST('/register', [AuthController::class, 'register']);
Route::POST('/login', [AuthController::class, 'login']);

Route::group(['middleware' => 'auth:sanctum'], function() {
    Route::GET('/books', [BookController::class, 'index']);
    Route::GET('/available-books', [BookController::class, 'available']);

    Route::GET('/want-to-read', [WantToReadController::class, 'index']);
    Route::POST('/want-to-read/{id}', [WantToReadController::class, 'add']);
    Route::DELETE('/want-to-read/{id}', [WantToReadController::class, 'delete']);
});
