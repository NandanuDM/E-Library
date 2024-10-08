<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Publisher extends Model
{
    use SoftDeletes;

    protected $table = 'publishers';
    protected $primaryKey = 'id';

    protected $fillable = ['name'];

    protected $dates = ['deleted_at'];

    /**
     * Get the books for the publisher.
     */
    public function books()
    {
        return $this->hasMany(Book::class, 'publisher_id', 'id');
    }
}
