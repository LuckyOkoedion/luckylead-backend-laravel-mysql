<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'client',
        'title',
        'description',
        'attachment',
        'deadline',
        'cost',
        'quality_assurer',
        'open',
        'bidding',
        'date_submitted',
        'advance_payment',
        'balance_payment',
        'paid_in_full'
    ];

    protected $attributes = [
        'open' => true,
        'bidding' => false,
        'paid_in_full' => false
    ];
}
