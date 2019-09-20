<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answer', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('question_id')->nullable()->unsigned();
            $table->boolean('is_correct')->nullable()->default(false);

            $table->string('description', 128)->nullable();
            
            $table->timestamps();
            $table->softDeletes();

            $table->integer('created_by')->nullable()->unsigned()->index();
            $table->integer('deleted_by')->nullable()->unsigned()->index();
            $table->integer('updated_by')->nullable()->unsigned()->index();

            $table->foreign('question_id')->references('id')->on('question')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('answer');
    }
}
