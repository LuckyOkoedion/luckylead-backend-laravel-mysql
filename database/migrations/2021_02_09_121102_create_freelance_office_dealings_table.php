<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFreelanceOfficeDealingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('freelance_office_dealings', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('freelancer')->unique();
            $table->boolean('approved');
            $table->foreignId('approved_by')->nullable();
            $table->timestamp('when_approved')->nullable();
            $table->string('account_name')->nullable();
            $table->string('account_number')->nullabe();
            $table->string('bank_name')->nullable();
            $table->string('bank_address')->nullable();
            $table->string('specialty');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('freelance_office_dealings');
    }
}
