<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvocateEmpanellmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advocate_empanellments', function (Blueprint $table) {
            $table->id();
                  $table->string("first_name");
            $table->string("middle_name")->nullable();
            $table->string("last_name");
            $table->string("father_name");
            $table->string("bar_council_enrollment_no");
            $table->string("date_of_bar_council_enrollment");
             $table->string("email_id");
            $table->string("mobile_number");
            $table->string("whatsapp_no")->nullable();
 
            $table->string("dob");
            $table->string("gender");
            $table->string("marital_status");
            $table->string("aadhar_no");
            $table->string("pan_no")->nullable();
            $table->string("gst_no")->nullable();
          
             $table->unsignedBigInteger("permanent_addresses_id");
            $table->unsignedBigInteger("correspondance_addresses_id");
            $table->unsignedBigInteger("uid");
            $table->unsignedBigInteger("is_submitted")->default(0);
            $table->unsignedBigInteger("is_verified")->default(0);
            $table->foreign("uid")->references('id')->on('users');
       $table->foreign("permanent_addresses_id")->references('id')->on('advocate_addresses');
   $table->foreign("correspondance_addresses_id")->references('id')->on('advocate_addresses');
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
        Schema::dropIfExists('advocate_empanellments');
    }
}
