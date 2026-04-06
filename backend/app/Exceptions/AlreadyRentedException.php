<?php

namespace App\Exceptions;

use Exception;

class AlreadyRentedException extends Exception
{
    public function render() {
        return response()->json([
            'message' => 'You have already rented this book'
        ], 422);
    }
}
