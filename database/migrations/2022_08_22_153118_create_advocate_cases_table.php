<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvocateCasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advocate_cases', function (Blueprint $table) {
            $table->id();
            $table->string('PlaintiffName');
            $table->string('DefendantName');
            $table->string('CourtName');
            $table->string('Dist');
            $table->string('State');
            $table->string('CourtCaseNo');
            $table->date('FillingDate');
            $table->string('LAETMCaseNo');
            $table->string('LAETMCin');
            $table->string('PresentStatus');
            $table->date('NextDateofHearing');
            $table->string('Remarks');
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
        Schema::dropIfExists('advocate_cases');
    }
}
