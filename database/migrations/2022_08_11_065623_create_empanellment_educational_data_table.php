<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpanellmentEducationalDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empanellment_educational_data', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("board");
            $table->string("passing_date");
            $table->string("percentage");
            $table->string("achievement")->nullable();
            $table->unsignedBigInteger("advocate_empanellments_id");
             $table->unsignedBigInteger("uid");
 $table->foreign("uid")->references('id')->on('users');
       $table->foreign("advocate_empanellments_id")->references('id')->on('advocate_empanellments');
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
        Schema::dropIfExists('empanellment_educational_data');
    }
}
