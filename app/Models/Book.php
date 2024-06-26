<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Book extends Model
{
    use HasFactory;

    protected $fillable= [
        'title',
        'author',
        'publication_date',
        'isbn',
    ];

    public function reviews(): HasMany
    {
        return $this->hasMany(BookReview::class);
    }
}
