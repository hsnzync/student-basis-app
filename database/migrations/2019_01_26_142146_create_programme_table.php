<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgrammeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programme', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('school_id')->nullable()->unsigned();
            $table->boolean('is_active')->nullable()->default(false);

            $table->string('title', 128)->nullable();
            $table->string('slug', 128)->nullable();

            $table->timestamps();

            $table->foreign('school_id')->references('id')->on('school')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('programme');
    }
}
