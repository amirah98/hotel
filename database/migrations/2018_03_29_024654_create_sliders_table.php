<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 200);
            $table->string('small_title', 30)->nullable();
            $table->string('big_title', 30)->nullable();
            $table->string('description', 100)->nullable();
            $table->string('link1', 100)->nullable();
            $table->string('link1_text', 15)->nullable();
            $table->string('link2', 100)->nullable();
            $table->string('link2_text', 15)->nullable();
            $table->boolean('status')->default(true);
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
        Schema::dropIfExists('sliders');
    }
}
