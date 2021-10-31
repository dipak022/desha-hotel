<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceprovideTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('serviceprovide', function (Blueprint $table) {
            $table->id();
            $table->integer('service_customer_name');
            $table->string('service_provider_name');
            $table->string('service_provider_unit');
            $table->string('service_provider_price');
            $table->string('service_provider_total');
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
        Schema::dropIfExists('serviceprovide');
    }
}
