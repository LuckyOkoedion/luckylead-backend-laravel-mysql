<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client');
            $table->string('title');
            $table->longText('description');
            $table->string('attachment')->nullable();
            $table->date('deadline');
            $table->decimal('cost');
            $table->foreignId('quality_assurer')->nullable();
            $table->boolean('open');
            $table->boolean('bidding');
            $table->date('date_submitted');
            $table->decimal('advance_payment');
            $table->decimal('balance_payment');
            $table->boolean('paid_in_full');
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
        Schema::dropIfExists('jobs');
    }
}
