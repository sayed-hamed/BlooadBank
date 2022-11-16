<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->date('d_o_b');
            $table->date('last_donation_date');
            $table->string('phone');
            $table->string('status');
            $table->string('password');
            $table->string('password_confirmation');
            $table->string('pin_code','6');
            $table->string('api_token','60');
            $table->unsignedBigInteger('city_id');
            $table->foreign('city_id')->references('id')->on('cities')->cascadeOnDelete();

            $table->unsignedBigInteger('blood_id');
            $table->foreign('blood_id')->references('id')->on('blood__types')->cascadeOnDelete();
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
        Schema::dropIfExists('clients');
    }
};
