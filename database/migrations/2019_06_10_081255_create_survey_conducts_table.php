<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurveyConductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_conducts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('userSurveyId')->unsigned();
            $table->string('question',255);
            $table->string('answer',255);
            $table->foreign('userSurveyId')->references('id')->on('user_surveys');
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
        Schema::dropIfExists('survey_conducts');
    }
}
