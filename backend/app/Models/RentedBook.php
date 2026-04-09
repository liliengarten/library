<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class RentedBook extends Model
{
    public function BelongsToUser(): BelongsToMany {
        return $this->belongsToMany(User::class, 'rented_books');
    }
    protected $fillable = [
        'user_id',
        'book_id',
    ];
}
