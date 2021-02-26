<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloggersOfficeDealings extends Model
{
    use HasFactory;

    protected $fillable = [
        'user',
        'approved',
        'approved_when',
        'approved_by'
    ];

    protected $attributes = [
        'approved' => false
    ];
}
