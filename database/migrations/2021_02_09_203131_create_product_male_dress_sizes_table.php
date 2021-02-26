<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductMaleDressSizesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_male_dress_sizes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product');
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
        Schema::dropIfExists('product_male_dress_sizes');
    }
}
