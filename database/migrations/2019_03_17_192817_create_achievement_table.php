<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAchievementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('achievement', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('is_active')->nullable()->default(false);

            $table->string('title', 128)->nullable();
            $table->string('description', 128)->nullable();
            $table->integer('unlocked_at')->nullable();

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
        Schema::dropIfExists('achievement');
    }
}
