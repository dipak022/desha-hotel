<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservation', function (Blueprint $table) {
            $table->id();
            
            
            $table->string('check_in_date');
            $table->string('check_in_time');
            $table->string('check_out_date');
            $table->string('check_out_time');
            $table->string('number_of_adult');
            $table->integer('customers_id');
            $table->integer('room_categ_id');
            $table->integer('rooms_id');
            $table->integer('room_floor'); 
            $table->integer('room_price');
            $table->integer('pay_amount');
            $table->integer('due_amount');
            $table->string('status');
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
        Schema::dropIfExists('reservation');
    }
}
