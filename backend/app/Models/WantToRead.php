<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class WantToRead extends Model
{
    public function BelongsToUser(): BelongsToMany {
        return $this->belongsToMany(User::class, 'want_to_read');
    }

    protected $table = 'want_to_read';
    protected $fillable = [
        'user_id',
        'book_id',
    ];
}
