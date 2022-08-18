<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMainCasesHandeledsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('main_cases_handeleds', function (Blueprint $table) {
            $table->id();
                  $table->string("CourtName");
            $table->string("CaseName");
            $table->string("LawConcernedArea");
            $table->string("LastOrderDate");
            $table->string("Role");
            $table->longText("CaseFact");
            
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
        Schema::dropIfExists('main_cases_handeleds');
    }
}
