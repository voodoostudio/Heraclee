<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ApimoAreas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apimo_areas', function (Blueprint $table) {
            $table->increments("id");
            $table->integer('property_id');
            $table->integer('type');
            $table->integer('number');
            $table->string('area')->nullable();
            $table->integer('flooring')->nullable();
            $table->integer('floor_type')->nullable();
            $table->integer('floor_value')->nullable();
            $table->string('orientations')->nullable();
            $table->text('comments')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('apimo_areas');
    }
}
