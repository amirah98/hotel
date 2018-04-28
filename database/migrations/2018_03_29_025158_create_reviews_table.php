<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->increments('id');
            $table->string('review', 100);
            $table->enum('rating', ['0', '1', '2', '3', '4', '5']);
            $table->enum('approval_status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->integer('room_booking_id')->unsigned()->index();
            $table->timestamps();

            $table->foreign('room_booking_id')
                ->references('id')->on('room_bookings')
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
        Schema::dropIfExists('reviews');
    }
}
