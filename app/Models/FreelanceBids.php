<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FreelanceBids extends Model
{
    use HasFactory;

    protected $fillable = [
        'freelancer',
        'project',
        'bid_amount',
        'bid_approved',
        'bid-date'
    ];

    protected $attributes = [
        'bid_approved' => false
    ];
}
