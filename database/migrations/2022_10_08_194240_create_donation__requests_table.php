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
        Schema::create('donation__requests', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone');
            $table->integer('num_bags');
            $table->string('hospital_address');
            $table->integer('age');
            $table->text('details');
            $table->decimal('longitude',10,8);
            $table->decimal('latitude',10,8);
            $table->unsignedBigInteger('client_id');
            $table->foreign('client_id')->references('id')->on('clients')->cascadeOnDelete();
            $table->unsignedBigInteger('government_id');
            $table->foreign('government_id')->references('id')->on('governments')->cascadeOnDelete();
            $table->unsignedBigInteger('blood_type_id');
            $table->foreign('blood_type_id')->references('id')->on('blood__types')->cascadeOnDelete();
            $table->unsignedBigInteger('city_id');
            $table->foreign('city_id')->references('id')->on('cities')->cascadeOnDelete();


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
        Schema::dropIfExists('donation__requests');
    }
};
