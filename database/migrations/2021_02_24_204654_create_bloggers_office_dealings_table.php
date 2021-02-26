<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBloggersOfficeDealingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bloggers_office_dealings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user')->unique();
            $table->boolean('approved');
            $table->timestamps('approved_when');
            $table->foreignId('approved_by');
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
        Schema::dropIfExists('bloggers_office_dealings');
    }
}
