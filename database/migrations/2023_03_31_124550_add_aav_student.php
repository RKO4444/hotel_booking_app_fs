<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAavStudent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->foreign('booking_id')->references('booking_id')->on('bookings')->onDelete('cascade');
        });
        Schema::table('rooms', function (Blueprint $table) {
            $table->foreign('hotel_id')->references('hotel_id')->on('hotels')->onDelete('cascade');

            $table->foreign('room_type_id')->references('room_type_id')->on('roomtypes')->onDelete('cascade');
        });
        Schema::table('bookings', function (Blueprint $table) {
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
           $table->foreign('hotel_id')->references('hotel_id')->on('hotels')->onDelete('cascade');
           $table->foreign('room_id')->references('room_id')->on('rooms')->onDelete('cascade');
        });


        

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
