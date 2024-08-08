<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Member extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'photo',
        'full_name',
        'address',
        'phone',
        'email',
        'type',
    ];

    protected $dates = ['deleted_at'];

    /**
     * Get the borrowings for the member.
     */
    public function borrowings()
    {
        return $this->hasMany(Borrowing::class);
    }
}
