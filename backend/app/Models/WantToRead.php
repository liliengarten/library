<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WantToRead extends Model
{
    protected $table = 'want_to_read';
    protected $fillable = [
        'user_id',
        'book_id',
    ];
}
