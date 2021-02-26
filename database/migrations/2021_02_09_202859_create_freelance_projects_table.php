<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFreelanceProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('freelance_projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('assigned_to')->nullable();
            $table->foreignId('created_by');
            $table->foreignId('assigned_by')->nullable();
            $table->foreignId('job');
            $table->string('name');
            $table->string('description');
            $table->string('skill_set');
            $table->string('limitation')->nullable();
            $table->string('status');
            $table->string('charter')->nullable();
            $table->date('original_deadline');
            $table->date('new_deadline')->nullable();
            $table->decimal('original_cost');
            $table->decimal('new_cost')->nullable();
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
        Schema::dropIfExists('freelance_projects');
    }
}
