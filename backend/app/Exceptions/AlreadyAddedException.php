<?php

namespace App\Exceptions;

use Exception;

class AlreadyAddedException extends Exception
{
    public function render()
    {
        return response()->json([
            'message' => 'You have already added this book to list'
        ], 422);
    }
}
