<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RentedBook extends Model
{
    protected $fillable = [
        'user_id',
        'book_id',
    ];
}
