<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserSurveysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_surveys', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('surveyID')->unsigned();
            $table->string('ip');
            $table->foreign('surveyID')->references('id')->on('surveys');
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
        Schema::dropIfExists('user_surveys');
    }
}
