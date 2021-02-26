<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductMaleFootwearSizes extends Model
{
    use HasFactory;

    protected $fillable = [
        'product',
        'thirty_six',
        'thirty_seven',
        'thirty_seven_point_five',
        'thirty_eight',
        'thirty_nine',
        'thirty_nine_point_five',
        'forty',
        'forty_one',
        'forty_one_point_five',
        'forty_two',
        'forty_three',
        'forty_three_point_five',
        'forty_four',
        'forty_four_point_five',
       'forty_five',
        'forty_five_point_five',
        'forty_six',
        'forty_seven',
        'forty_seven_point_five',
        'forty_eight',
        'forty_nine',
        'forty_nine_point_five',
        'fifty',
        'fifty_one',
        'fifty_two',
        'fifty_three',
        'fifty_four',
        'fifty_five'
    ];


    protected $attributes = [
        'thirty_six' => 0,
        'thirty_seven' => 0,
        'thirty_seven_point_five' => 0,
        'thirty_eight' => 0,
        'thirty_nine' => 0,
        'thirty_nine_point_five' => 0,
        'forty' => 0,
        'forty_one' => 0,
        'forty_one_point_five' => 0,
        'forty_two' => 0,
        'forty_three' => 0,
        'forty_three_point_five' => 0,
        'forty_four' => 0,
        'forty_four_point_five' => 0,
       'forty_five' => 0,
        'forty_five_point_five' => 0,
        'forty_six' => 0,
        'forty_seven' => 0,
        'forty_seven_point_five' => 0,
        'forty_eight' => 0,
        'forty_nine'=> 0,
        'forty_nine_point_five' => 0,
        'fifty' => 0,
        'fifty_one' => 0,
        'fifty_two' => 0,
        'fifty_three' => 0,
        'fifty_four' => 0,
        'fifty_five' => 0,
    ];
}
