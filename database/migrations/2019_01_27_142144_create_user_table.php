<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('school_id')->nullable()->unsigned();
            $table->integer('programme_id')->nullable()->unsigned();
            $table->boolean('is_active')->nullable()->default(true);
            $table->boolean('is_has_permission')->nullable()->default(false);

            $table->string('username', 128)->unique()->nullable();
            $table->integer('student_number')->unique()->nullable();
            $table->string('email', 128)->unique()->nullable();
            $table->string('password')->nullable();

            $table->string('avatar', 128)->default('default.png');
            $table->integer('level')->nullable()->default(1);
            $table->integer('experience_points')->nullable();
            
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('school_id')->references('id')->on('school');
            $table->foreign('programme_id')->references('id')->on('programme');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user');
    }
}
