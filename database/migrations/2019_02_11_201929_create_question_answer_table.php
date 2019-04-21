<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionAnswerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_answer', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('question_id')->nullable()->unsigned();
            $table->integer('answer_id')->nullable()->unsigned();

            $table->foreign('question_id')->references('id')->on('question');
            $table->foreign('answer_id')->references('id')->on('answer');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('question_answer');
    }
}
