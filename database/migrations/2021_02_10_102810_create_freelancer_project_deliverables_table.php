<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFreelancerProjectDeliverablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('freelancer_project_deliverables', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project');
            $table->date('date_submitted');
            $table->foreignId('from');
            $table->boolean('approved');
            $table->integer('milestone_number');
            $table->integer('total_project_milestones');
            $table->string('attachment')->nullable();
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
        Schema::dropIfExists('freelancer_project_deliverables');
    }
}
