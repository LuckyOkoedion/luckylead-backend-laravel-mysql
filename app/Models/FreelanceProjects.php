<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FreelanceProjects extends Model
{
    use HasFactory;

    protected $fillable = [
        'assigned_to',
        'assigned_by',
        'created_by',
        'job',
        'name',
        'description',
        'skill_set',
        'limitation',
        'status',
        'charter',
        'original_deadline',
        'new_deadline',
        'original_cost',
        'new_cost'



    ];

    protected $attributes = [

    ];
}
