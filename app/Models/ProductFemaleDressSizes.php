<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductFemaleDressSizes extends Model
{
    use HasFactory;

    protected $fillable = [
        'product',
        'xxs',
        'xs',
        's',
        'm',
        'l',
        'xl',
        'xxl'
    ];

    protected $attributes = [
        'xxs'=> 0,
        'xs'=> 0,
        's'=> 0,
        'm'=> 0,
        'l'=> 0,
        'xl'=> 0,
        'xxl'=> 0
    ];
}
