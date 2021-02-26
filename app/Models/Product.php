<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'seller',
        'description',
        'picture',
        'male_dress',
        'male_footwear',
        'female_dress',
        'female_footwear',
        'category',
        'quantity',
        'price',
        'in_stock'
    ];

    protected $attributes = [
        'male_dress' => false,
        'male_footwear' => false,
        'female_dress' => false,
        'female_footwear' => false,
        'in_stock' => true
    ];
}
