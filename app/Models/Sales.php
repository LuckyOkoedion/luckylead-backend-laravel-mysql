<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer',
        'product',
        'date',
        'trader',
        'paid',
        'payment_method',
        'delivery_address',
        'delivered',
        'returned',

    ];

    protected $attributes = [
        'paid'=> false,
        'delivered' => false,
        'returned' => false
    ];
}
