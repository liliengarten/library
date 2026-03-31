<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RentHistory extends Model
{
    protected $table = 'rent_history';
    protected $fillable = [
        'user_id',
        'book_id',
    ];
}
