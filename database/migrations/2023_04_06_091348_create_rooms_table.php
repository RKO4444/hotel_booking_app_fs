<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->integer('price');
            $table->string('facilities');
            $table->boolean('avail');
            $table->timestamps();
            $table->unsignedBigInteger('roomtype_id')->index();
            $table->foreign('roomtype_id')->references('id')->on('roomtypes')->onDelete('cascade');
            $table->unsignedBigInteger('hotel_id')->index();
            $table->foreign('hotel_id')->references('id')->on('hotels')->onDelete('cascade');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
}
