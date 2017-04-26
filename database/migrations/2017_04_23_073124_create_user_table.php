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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('app_id');
            $table->integer('active');
            $table->timestamps();
            $table->string('firstname')->nullable();
            $table->string('language')->nullable();
            $table->integer('group');
            $table->string('email')->nullable();
            $table->integer('phone')->nullable();
            $table->integer('fax')->nullable();
            $table->integer('mobile')->nullable();
            $table->integer('birthday_at')->nullable();
            $table->integer('timezone')->nullable();
            $table->string('picture')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
