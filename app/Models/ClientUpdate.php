<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientUpdate extends Model
{
    use HasFactory;

    protected $fillable = [
        'client',
        'job',
        'update_type',
        'content',
        'attachment',
        'update_given_by'
    ];

    protected $attributes = [

    ];
}
