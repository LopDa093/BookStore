<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookReview extends Model
{
    use HasFactory;

    protected $fillable= [
        'book_id',
        'reviewer_name',
        'review',
        'rating',
    ];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

}
