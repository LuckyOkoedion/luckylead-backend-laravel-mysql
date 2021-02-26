<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogComments extends Model
{
    use HasFactory;

    protected $fillable = [
        'blog',
        'commenter',
        'timestamp',
        'comment',
        'show',
    ];

    protected $attributes = [
        'show' => true
    ];
}
