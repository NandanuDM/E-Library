<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    protected $fillable = ['name'];

    /**
     * Get the books for the publisher.
     */
    public function books()
    {
        return $this->hasMany(Book::class);
    }
}