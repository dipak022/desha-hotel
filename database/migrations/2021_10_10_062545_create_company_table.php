<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company', function (Blueprint $table) {
            $table->id();
            
            $table->string('company_name');
            $table->string('company_address');
            $table->string('company_website');
            $table->string('company_contact_number');
            $table->string('company_email');
            $table->string('company_contact_personal_name');
            $table->string('company_contact_personal_ph_no');
            $table->string('company_contact_personal_email');
            $table->string('company_contact_personal_nid');
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
        Schema::dropIfExists('company');
    }
}
