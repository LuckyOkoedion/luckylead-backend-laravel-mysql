<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FreelanceApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'user',
        'approved_when',
        'approved',
        'approved_by'
    ];

    protected $attributes = [
        'approved' => false
    ];
}
