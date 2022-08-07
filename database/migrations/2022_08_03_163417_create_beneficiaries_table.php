<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeneficiariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beneficiaries', function (Blueprint $table) {
            $table->id();
                $table->string("first_name");
            $table->string("middle_name")->nullable();
            $table->string("last_name");
            $table->string("father_name");
            $table->string("mother_name");
            $table->string("spouse_name")->nullable();
            $table->string("email_id");
            $table->string("mobile_number");
            $table->string("whatsapp_no")->nullable();
 
            $table->string("dob");
            $table->string("gender");
            $table->string("marital_status");
            $table->string("aadhar_no");
            $table->string("pan_no")->nullable();
            $table->string("driving_licence_no")->nullable();
            $table->string("aadhar_card");
            
            $table->string("photo_beneficiary")->nullable();
            $table->string("driving_licence")->nullable();
             $table->unsignedBigInteger("permanent_addresses_id");
            $table->unsignedBigInteger("correspondance_addresses_id");
            $table->unsignedBigInteger("uid");
            $table->unsignedBigInteger("is_verified");
            $table->foreign("uid")->references('id')->on('users');
       $table->foreign("permanent_addresses_id")->references('id')->on('addresses');
   $table->foreign("correspondance_addresses_id")->references('id')->on('addresses');

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
        Schema::dropIfExists('beneficiaries');
    }
}
