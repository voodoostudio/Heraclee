<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ApimoWater extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apimo_water', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('property_id');
            $table->integer('hot_device')->nullable();
            $table->integer('hot_access')->nullable();
            $table->integer('waste')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('apimo_water');
    }
}
