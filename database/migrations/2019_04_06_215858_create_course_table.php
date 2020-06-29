<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('subject_id')->nullable()->unsigned();
            $table->boolean('is_active')->nullable()->default(true);

            $table->string('title', 128)->nullable();
            $table->string('slug', 128)->nullable();
            $table->string('hex', 128)->nullable();
            $table->integer('points')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->integer('created_by')->nullable()->unsigned()->index();
            $table->integer('deleted_by')->nullable()->unsigned()->index();
            $table->integer('updated_by')->nullable()->unsigned()->index();

            $table->foreign('subject_id')->references('id')->on('subject')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course');
    }
}
