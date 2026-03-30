<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\WantToReadController;
use App\Http\Controllers\BookRentController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::POST('/register', [AuthController::class, 'register']);
Route::POST('/login', [AuthController::class, 'login']);

Route::group(['middleware' => 'auth:sanctum'], function() {

    Route::group(['middleware' => 'admin'], function() {
        Route::POST('/books', [BookController::class, 'add']);
        Route::PATCH('/books/{id}', [BookController::class, 'update']);
        Route::DELETE('/books/{id}', [BookController::class, 'remove']);
    });

    Route::GET('/logout', [AuthController::class, 'logout']);

    Route::GET('/books', [BookController::class, 'index']);
    Route::GET('/available-books', [BookController::class, 'available']);

    Route::GET('/want-to-read', [WantToReadController::class, 'index']);
    Route::POST('/want-to-read/{id}', [WantToReadController::class, 'add']);
    Route::DELETE('/want-to-read/{id}', [WantToReadController::class, 'remove']);

    Route::GET('/rented-books', [BookRentController::class, 'index']);
    Route::POST('/rented-books/{id}', [BookRentController::class, 'add']);
    Route::GET('/rent-history', [BookRentController::class, 'history']);
});
