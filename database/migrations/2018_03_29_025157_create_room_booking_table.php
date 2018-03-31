<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomBookingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_booking', function (Blueprint $table) {
            $table->integer('booking_id')->unsigned()->index();
            $table->integer('room_id')->unsigned()->index();
            $table->date('arrival_date');
            $table->date('departure_date')->nullable();
            $table->decimal('cost', 8, 2);
            $table->timestamps();

            $table->foreign('booking_id')
                ->references('id')->on('bookings')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('room_id')
                ->references('id')->on('rooms')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('room_booking');
    }
}
