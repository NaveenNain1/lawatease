<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlansStructuresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plans_structures', function (Blueprint $table) {
            $table->id();
            $table->string("qty");
            $table->unsignedBigInteger('plans_particulars_id');
$table->foreign("plans_particulars_id")->references('id')->on('plans_particulars');
            $table->unsignedBigInteger('plans_id');
$table->foreign("plans_id")->references('id')->on('plans');
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
        Schema::dropIfExists('plans_structures');
    }
}
