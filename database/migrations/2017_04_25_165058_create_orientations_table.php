<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrientationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orientations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('east')->nullable();
            $table->string('north')->nullable();
            $table->string('west')->nullable();
            $table->string('south')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orientations');
    }
}
