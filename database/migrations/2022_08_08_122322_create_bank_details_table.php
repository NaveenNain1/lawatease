<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBankDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *For Advocate
     * @return void
     */
    public function up()
    {
        Schema::create('bank_details', function (Blueprint $table) {
            $table->id();
            $table->string("bank_name");
            $table->string("account_no");
            $table->string("ifsc_no");
            $table->string("account_holder_name");
            $table->string("branch_address");
            $table->string("cancelled_cheque");
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
        Schema::dropIfExists('bank_details');
    }
}
