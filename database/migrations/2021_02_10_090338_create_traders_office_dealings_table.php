<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTradersOfficeDealingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('traders_office_dealings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('trader')->unique();
            $table->boolean('approved');
            $table->string('identity_type')->nullable();
            $table->string('identity_number')->nullable();
            $table->string('id_upload')->nullable();
            $table->string('contract_upload')->nullable();
            $table->foreignId('approved_by')->nullable();
            $table->date('when_approved')->nullable();
            $table->string('brand_name');
            $table->longText('business_office');
            $table->string('bank_name');
            $table->longText('bank_address');
            $table->string('account_number');
            $table->string('account_name');
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
        Schema::dropIfExists('traders_office_dealings');
    }
}
