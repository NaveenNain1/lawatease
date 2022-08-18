<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvocateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advocate_addresses', function (Blueprint $table) {
            $table->id();
            $table->string("house_no");
            $table->string("street");
            $table->string("district");
            $table->string("state");
            $table->string("country");
            $table->string("pincode");
             $table->unsignedBigInteger("uid");
            $table->foreign("uid")->references('id')->on('users');
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
        Schema::dropIfExists('advocate_addresses');
    }
}
