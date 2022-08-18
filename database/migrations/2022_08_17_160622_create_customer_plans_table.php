<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_plans', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->unsignedBigInteger("purchase_price");
            $table->date("purchase_date");
            $table->string("period");
            $table->string("period_type");
            $table->unsignedBigInteger("plans_id");
            $table->unsignedBigInteger("uid");
            $table->foreign("plans_id")->references('id')->on('plans');
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
        Schema::dropIfExists('customer_plans');
    }
}
