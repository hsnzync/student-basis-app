<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subject', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('programme_id')->nullable()->unsigned();
            
            $table->boolean('is_active')->nullable()->default(true);
            
            $table->string('slug', 128)->nullable();
            $table->string('title', 128)->nullable();
            $table->text('description', 500)->nullable();
            $table->string('image_url')->nullable();

            $table->timestamps();

            $table->foreign('programme_id')->references('id')->on('programme')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subject');
    }
}
