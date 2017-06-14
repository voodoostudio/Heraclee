<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ApimoArea extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apimo_area', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('property_id')->unique();
            $table->integer('unit');
            $table->integer('value')->nullable();
            $table->integer('total')->nullable();
            $table->integer('weighted')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('apimo_area');
    }
}
