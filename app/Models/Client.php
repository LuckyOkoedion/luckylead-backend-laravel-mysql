<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'currency',
        'country',
        'postal_address',
        'email_verified',
        'credit_card',
        'amount_spent',
        'owing',
        'difficult'
    ];

    protected $attributes = [
        'email_verified' => false,
        'credit_card' => false,
        'amount_spent' => 0.00,
        'owing' => false,
        'difficult' => false
    ];
}
