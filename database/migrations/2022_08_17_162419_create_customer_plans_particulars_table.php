<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerPlansParticularsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_plans_particulars', function (Blueprint $table) {
            $table->id();
               $table->string('name');
            $table->string('unit');
            $table->unsignedBigInteger('can_avail')->default('1');
                $table->unsignedBigInteger("plans_id");
                $table->unsignedBigInteger("customer_plans_id");
             $table->unsignedBigInteger("total_service");
            $table->unsignedBigInteger("used_service");
            $table->unsignedBigInteger("uid");
            
           $table->foreign("customer_plans_id")->references('id')->on('customer_plans');
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
        Schema::dropIfExists('customer_plans_particulars');
    }
}
