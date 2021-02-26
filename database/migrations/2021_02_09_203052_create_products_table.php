<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('seller');
            $table->longText('description');
            $table->string('picture');
            $table->boolean('male_dress');
            $table->boolean('male_footwear');
            $table->boolean('female_dress');
            $table->boolean('female_footwear');
            $table->string('category');
            $table->integer('quantity');
            $table->decimal('price');
            $table->boolean('in_stock');
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
        Schema::dropIfExists('products');
    }
}
