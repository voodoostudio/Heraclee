<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminPostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_post', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title_fr', 255)->nullable();
            $table->string('title_en', 255)->nullable();
            $table->date('date')->nullable();
            $table->string('front_image', 1024)->default('');
            $table->string('body_image', 1024)->default('');
            $table->text('description_fr')->nullable();
            $table->text('description_en')->nullable();
            $table->string('status')->nullable();
            $table->string('link', 512)->nullable();
            $table->string('video_link', 512)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin_post');
    }
}
