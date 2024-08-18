<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $table = 'categories';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
    ];

    protected $dates = ['deleted_at'];

    /**
     * Get the books for the category.
     */
    public function books()
    {
        return $this->hasMany(Book::class, "category_id", "id");
    }
}
