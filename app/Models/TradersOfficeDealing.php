<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TradersOfficeDealing extends Model
{
    use HasFactory;

    protected $fillable = [
        'trader',
        'approved',
        'approved_by',
        'when_approved',
        'identity_type',
        'identity_number',
        'id_upload',
        'contract_upload',
        'brand_name',
        'business_office',
        'bank_name',
        'bank_address',
        'account_number',
        'account_name'
    ];

    protected $attributes = [
        'approved' => false
    ];
}
