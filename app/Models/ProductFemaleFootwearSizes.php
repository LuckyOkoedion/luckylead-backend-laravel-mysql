<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductFemaleFootwearSizes extends Model
{
    use HasFactory;

    protected $fillable = [
        'product',
        'thirty_five_point_five',
        'thirty_six',
        'thirty_seven',
        'thirty_seven_point_five',
        'thirty_eight',
        'thirty_eight_point_five',
        'thirty_nine',
        'forty',
        'forty_point_five',
        'forty_one',
        'forty_two',
        'forty_two_point_five',
        'forty_three',
        'forty_four',
        'forty_four_point_five',
        'forty_six'
    ];

    protected $attributes = [
        'thirty_five_point_five'=> 0,
        'thirty_six'=> 0,
        'thirty_seven'=> 0,
        'thirty_seven_point_five'=> 0,
        'thirty_eight'=> 0,
        'thirty_eight_point_five'=> 0,
        'thirty_nine'=> 0,
        'forty'=> 0,
        'forty_point_five'=> 0,
        'forty_one'=> 0,
        'forty_two'=> 0,
        'forty_two_point_five'=> 0,
        'forty_three'=> 0,
        'forty_four'=> 0,
        'forty_four_point_five'=> 0,
        'forty_six' => 0
    ];
}
