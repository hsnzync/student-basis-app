<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('subject_id')->nullable()->unsigned();
            
            $table->string('title', 128)->nullable();
            $table->text('description', 500)->nullable();;
            $table->text('slug', 128)->nullable();;
            
            $table->timestamps();
            $table->softDeletes();

            $table->integer('created_by')->nullable()->unsigned()->index();
            $table->integer('deleted_by')->nullable()->unsigned()->index();
            $table->integer('updated_by')->nullable()->unsigned()->index();

            $table->foreign('subject_id')->references('id')->on('subject');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('question');
    }
}
