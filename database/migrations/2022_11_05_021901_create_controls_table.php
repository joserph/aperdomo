<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateControlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('controls', function (Blueprint $table) {
            $table->id();

            $table->string('num');
            $table->date('date');
            $table->string('identification');
            $table->string('client');
            $table->unsignedBigInteger('validity_id');
            $table->unsignedBigInteger('service_id');
            $table->string('status');
            $table->string('total');
            $table->string('payment_form');
            $table->string('bank');
            $table->string('modality');
            $table->unsignedBigInteger('partner_id');
            $table->string('sub_total');
            $table->string('discount');
            $table->string('aditional_price');

            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('user_update');

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('user_update')->references('id')->on('users');
            $table->foreign('validity_id')->references('id')->on('validities');
            $table->foreign('service_id')->references('id')->on('services');
            $table->foreign('partner_id')->references('id')->on('partners');

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
        Schema::dropIfExists('controls');
    }
}
