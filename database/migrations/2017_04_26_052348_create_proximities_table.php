<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProximitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proximities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('bus')->nullable();
            $table->string('bus_hub')->nullable();
            $table->string('metro')->nullable();
            $table->string('shops')->nullable();
            $table->string('primary_school')->nullable();
            $table->string('beach')->nullable();
            $table->string('town_centre')->nullable();
            $table->string('hospital_clinic')->nullable();
            $table->string('doctor')->nullable();
            $table->string('tram')->nullable();
            $table->string('station')->nullable();
            $table->string('taxi')->nullable();
            $table->string('public_parking')->nullable();
            $table->string('park')->nullable();
            $table->string('supermarket')->nullable();
            $table->string('sea_port')->nullable();
            $table->string('day_care')->nullable();
            $table->string('public_pool')->nullable();
            $table->string('tennis')->nullable();
            $table->string('golf')->nullable();
            $table->string('movies')->nullable();
            $table->string('middle_school')->nullable();
            $table->string('sport_center')->nullable();
            $table->string('airport')->nullable();
            $table->string('ski_slope')->nullable();
            $table->string('sea')->nullable();
            $table->string('tgv_station')->nullable();
            $table->string('highway')->nullable();
            $table->string('university')->nullable();
            $table->string('convention_center')->nullable();
            $table->string('lake')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proximities');
    }
}
