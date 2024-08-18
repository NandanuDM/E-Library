<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use SoftDeletes; // Using SoftDeletes trait

    protected $table = 'books';
    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'isbn',
        'author',
        'published_year',
        'category_id',
        'publisher_id',
        'cover_image',
        'stock',
        'rental_price',
    ];

    protected $dates = ['deleted_at']; // Defining deleted_at column for soft deletes

    /**
     * Get the category that owns the book.
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    /**
     * Get the publisher that owns the book.
     */
    public function publisher()
    {
        return $this->belongsTo(Publisher::class, 'publisher_id', 'id');
    }
}
