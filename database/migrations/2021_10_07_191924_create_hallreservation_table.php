<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHallreservationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hallreservation', function (Blueprint $table) {
            $table->id();
            $table->integer('customer_id');
            $table->integer('hall_id');
            $table->string('check_in');
            $table->string('check_out');
            $table->string('status');
            $table->integer('session_day_hour_quantity');
            $table->integer('total_amount');
            $table->integer('total_guest');
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
        Schema::dropIfExists('hallreservation');
    }
}
