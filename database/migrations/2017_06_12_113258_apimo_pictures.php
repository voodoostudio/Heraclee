<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ApimoPictures extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apimo_pictures', function (Blueprint $table) {
            $table->integer('picture_id')->unique();
            $table->integer('rank');
            $table->string('url');
            $table->integer('width_max');
            $table->integer('height_max');
            $table->text('comments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('apimo_pictures');
    }
}
