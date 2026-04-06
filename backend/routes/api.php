<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WantToReadController;
use App\Http\Controllers\RentController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::POST('/register', [AuthController::class, 'register']);
Route::POST('/login', [AuthController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum', 'block']], function() {
    Route::GET('/logout', [AuthController::class, 'logout']);

    Route::group(['middleware' => 'admin'], function() {
        Route::POST('/books', [BookController::class, 'add']);
        Route::PATCH('/books/{book}', [BookController::class, 'update']);
        Route::DELETE('/books/{book}', [BookController::class, 'remove']);

        Route::GET('/users', [UserController::class, 'index']);
        Route::PATCH('/users/{user}', [UserController::class, 'block']);
    });

    Route::GET('/books', [BookController::class, 'index']);
    Route::GET('/available-books', [BookController::class, 'available']);

    Route::GET('/want-to-read', [WantToReadController::class, 'index']);
    Route::POST('/want-to-read/{book}', [WantToReadController::class, 'add']);
    Route::DELETE('/want-to-read/{book}', [WantToReadController::class, 'remove']);

    Route::GET('/rent-history', [RentController::class, 'history']);
    Route::GET('/rented-books', [RentController::class, 'index']);
    Route::POST('/rent/{book}', [RentController::class, 'add']);
    Route::DELETE('/rent/{book}', [RentController::class, 'remove']);
});
