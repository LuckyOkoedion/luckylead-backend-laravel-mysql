<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FreelancerProjectDeliverable extends Model
{
    use HasFactory;

    protected $fillable = [
        'project',
        'date_submitted',
        'from',
        'approved',
        'milestone_number',
        'total_project_milestones',
        'attachment'
    ];

    protected $attributes = [
        'approved' => false
    ];
}
