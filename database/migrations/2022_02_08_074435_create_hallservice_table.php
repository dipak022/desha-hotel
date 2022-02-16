<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHallserviceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hallservice', function (Blueprint $table) {
            $table->id();
            $table->string('category_id');
            $table->string('services_name')->nullable();
            $table->string('services_code')->nullable();
            $table->string('selling_price')->nullable();
            $table->string('root')->nullable();
            $table->string('patho')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('c=hallservice');
    }
}
