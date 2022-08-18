<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExistingEmpanelmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('existing_empanelments', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("EmpanelledSince");
            $table->string("EmpanelmentLetter");
            $table->string("ReferenceName");
            $table->string("ReferenceMobile");
            
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
        Schema::dropIfExists('existing_empanelments');
    }
}
