<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FreelanceOfficeDealing extends Model
{
    use HasFactory;

    protected $fillable = [
        'freelancer',
        'approved',
        'when_approved',
        'approved_by',
        'account_name',
        'account_number',
        'bank_name',
        'bank_address',
        'specialty',

    ];

    protected $attributes = [
        'approved' => false,
        
    ];
}
