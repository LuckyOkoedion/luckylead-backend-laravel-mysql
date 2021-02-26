<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategoryOptions extends Model
{
    use HasFactory;

    protected $fillable = [
        'option'
    ];
}
