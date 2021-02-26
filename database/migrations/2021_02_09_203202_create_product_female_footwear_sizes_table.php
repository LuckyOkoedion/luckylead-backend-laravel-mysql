<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductFemaleFootwearSizesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_female_footwear_sizes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product');
            $table->integer('thirty_five_point_five');
            $table->integer('thirty_six');
            $table->integer('thirty_seven');
            $table->integer('thirty_seven_point_five');
            $table->integer('thirty_eight');
            $table->integer('thirty_eight_point_five');
            $table->integer('thirty_nine');
            $table->integer('forty');
            $table->integer('forty_point_five');
            $table->integer('forty_one');
            $table->integer('forty_two');
            $table->integer('forty_two_point_five');
            $table->integer('forty_three');
            $table->integer('forty_four');
            $table->integer('forty_four_point_five');
            $table->integer('forty_six');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_female_footwear_sizes');
    }
}
