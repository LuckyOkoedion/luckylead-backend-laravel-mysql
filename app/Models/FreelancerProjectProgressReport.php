<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FreelancerProjectProgressReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'project',
        'date_submitted',
        'from',
        'report',
        'title'
    ];
}
