<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductMaleFootwearSizesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_male_footwear_sizes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product');
            $table->integer('thirty_six');
            $table->integer('thirty_seven');
            $table->integer('thirty_seven_point_five');
            $table->integer('thirty_eight');
            $table->integer('thirty_nine');
            $table->integer('thirty_nine_point_five');
            $table->integer('forty');
            $table->integer('forty_one');
            $table->integer('forty_one_point_five');
            $table->integer('forty_two');
            $table->integer('forty_three');
            $table->integer('forty_three_point_five');
            $table->integer('forty_four');
            $table->integer('forty_four_point_five');
            $table->integer('forty_five');
            $table->integer('forty_five_point_five');
            $table->integer('forty_six');
            $table->integer('forty_seven');
            $table->integer('forty_seven_point_five');
            $table->integer('forty_eight');
            $table->integer('forty_nine');
            $table->integer('forty_nine_point_five');
            $table->integer('fifty');
            $table->integer('fifty_one');
            $table->integer('fifty_two');
            $table->integer('fifty_three');
            $table->integer('fifty_four');
            $table->integer('fifty_five');
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
        Schema::dropIfExists('product_male_footwear_sizes');
    }
}
