<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteTraffic extends Model
{
    use HasFactory;

    protected $fillable = [
        'user',
        'timestamp',
        'page_url',
        'ip_address'
    ];
}
