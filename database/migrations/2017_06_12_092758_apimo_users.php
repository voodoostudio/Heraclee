<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ApimoUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apimo_users', function (Blueprint $table) {
            $table->integer('user_id')->unique();
            $table->integer('agency');
            $table->string('active');
            $table->string('firstname');
            $table->string('language');
            $table->string('group');
            $table->string('email');
            $table->string('phone');
            $table->string('fax');
            $table->string('mobile');
            $table->date('birthday_at');
            $table->string('timezone');
            $table->string('picture');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('apimo_users');
    }
}
