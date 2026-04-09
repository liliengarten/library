<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class RentHistory extends Model
{
    public function BelongsToUser(): BelongsToMany {
        return $this->belongsToMany(User::class, 'rent_history');
    }

    protected $table = 'rent_history';
    protected $fillable = [
        'user_id',
        'book_id',
    ];
}
