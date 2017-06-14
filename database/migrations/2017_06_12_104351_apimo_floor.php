<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ApimoFloor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apimo_floor', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('property_id');
            $table->integer('type')->nullable();
            $table->integer('value')->nullable();
            $table->integer('levels')->nullable();
            $table->integer('floors')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('apimo_floor');
    }
}
