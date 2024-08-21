<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class application extends Model
{
    use HasFactory;

    protected $table = 'applications';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'logo',
        'description',
        'email',
        'phone',
        'facebook',
        'twitter',
        'instagram',
        'linkedin',
    ];
}
