<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'title', 'author', 'published_year', 'category_id', 'publisher_id', 'cover_image', 'stock', 'rental_price',
    ];

    /**
     * Get the category that owns the book.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the publisher that owns the book.
     */
    public function publisher()
    {
        return $this->belongsTo(Publisher::class);
    }
}