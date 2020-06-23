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
            $table->boolean('is_active')->nullable()->default(true);

            $table->string('title', 128)->nullable();
            $table->string('slug', 128)->nullable();
            $table->string('image_url')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->integer('created_by')->nullable()->unsigned()->index();
            $table->integer('deleted_by')->nullable()->unsigned()->index();
            $table->integer('updated_by')->nullable()->unsigned()->index();
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
