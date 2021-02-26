<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFreelanceBidsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('freelance_bids', function (Blueprint $table) {
            $table->id();
            $table->foreignId('freelancer');
            $table->foreignId('project');
            $table->decimal('bid_amount');
            $table->boolean('bid_approved');
            $table->date('bid-date');
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
        Schema::dropIfExists('freelance_bids');
    }
}
