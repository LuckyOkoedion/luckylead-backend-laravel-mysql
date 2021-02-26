<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductFemaleDressSizesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_female_dress_sizes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product');
            $table->integer('xxs');
            $table->integer('xs');
            $table->integer('s');
            $table->integer('m');
            $table->integer('l');
            $table->integer('xl');
            $table->integer('xxl');
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
        Schema::dropIfExists('product_female_dress_sizes');
    }
}
