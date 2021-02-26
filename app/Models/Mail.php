<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mail extends Model
{
    use HasFactory;

    protected $fillable = [
        'sender',
        'receiver',
        'date_sent',
        'date_read',
        'read',
        'reply',
        'title',
        'body',
        'attachment',
        'reply_to'

    ];

    protected $attributes = [
        'read' => false,
        'reply' => false
    ];
}
