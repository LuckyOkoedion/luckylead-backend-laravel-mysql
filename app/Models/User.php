<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'picture',
        'role',
        'permissions',
        'email',
        'password',
        'approved',
        'when_approved',
        'approved_by',
        'email_verified'
    ];

    protected $attributes = [
        'approved' => true,
        'email_verified' => false,
        'role' => 'user',
        'permissions' => 'manage_own_comment,manage_own_profile,apply_for_role,manage_own_mail,manage_own_tasks,place_order'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'approved_by',
        'permissions'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
