<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mails', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sender');
            $table->foreignId('receiver');
            $table->foreignId('reply_to')->nullabel();
            $table->date('date_sent');
            $table->date('date_read')->nullabel();
            $table->boolean('read');
            $table->boolean('reply');
            $table->string('title');
            $table->string('body');
            $table->string('attachment')->nullabel();
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
        Schema::dropIfExists('mails');
    }
}
