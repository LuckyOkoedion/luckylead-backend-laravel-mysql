<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyCredits extends Model
{
    use HasFactory;

    protected $fillable = [
        'from',
        'date',
        'amount',
        'payment_method',
        'currency'
    ];
}
