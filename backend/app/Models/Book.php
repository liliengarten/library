<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'author',
        'description',
        'year',
        'available_copies'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
