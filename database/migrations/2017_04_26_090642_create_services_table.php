<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->increments('id');
            $table->string('internet')->nullable();
            $table->string('fireplace')->nullable();
            $table->string('disabled_access')->nullable();
            $table->string('air_conditioning')->nullable();
            $table->string('alarm')->nullable();
            $table->string('lift')->nullable();
            $table->string('caretaker')->nullable();
            $table->string('double_pane_windows')->nullable();
            $table->string('intercom')->nullable();
            $table->string('parabolic_antenna')->nullable();
            $table->string('swimming_pool')->nullable();
            $table->string('security_door')->nullable();
            $table->string('sprinkler_system')->nullable();
            $table->string('barbecue')->nullable();
            $table->string('electric_gate')->nullable();
            $table->string('crawl_space')->nullable();
            $table->string('car_port')->nullable();
            $table->text('caretaker_house')->nullable();
            $table->text('bay_window')->nullable();
            $table->text('central_vaccum_system')->nullable();
            $table->string('electric_shutters')->nullable();
            $table->string('window_shade')->nullable();
            $table->string('electric_window_shade')->nullable();
            $table->string('washing_machine')->nullable();
            $table->string('jacuzzi')->nullable();
            $table->text('sauna')->nullable();
            $table->text('whirlpool_tub')->nullable();
            $table->text('well')->nullable();
            $table->string('spring')->nullable();
            $table->string('engine_generator')->nullable();
            $table->string('dishwasher')->nullable();
            $table->string('hob')->nullable();
            $table->string('safe')->nullable();
            $table->string('helipad')->nullable();
            $table->string('videophone')->nullable();
            $table->string('video_security')->nullable();
            $table->text('stove')->nullable();
            $table->text('iron')->nullable();
            $table->string('hair_dryer')->nullable();
            $table->string('satellite_tv')->nullable();
            $table->string('dvd_player')->nullable();
            $table->string('cd_player')->nullable();
            $table->string('outdoor_lighting')->nullable();
            $table->string('spa')->nullable();
            $table->string('home_automation')->nullable();
            $table->string('furnished')->nullable();
            $table->string('linens')->nullable();
            $table->string('tableware')->nullable();
            $table->string('clothes_dryer')->nullable();
            $table->integer('phone')->nullable();
            $table->string('refrigerator')->nullable();
            $table->string('oven')->nullable();
            $table->string('reception_24_7')->nullable();
            $table->string('coffeemaker')->nullable();
            $table->string('microwave_oven')->nullable();
            $table->string('shabbat_elevator')->nullable();
            $table->string('sukkah')->nullable();
            $table->string('synagogue')->nullable();
            $table->string('digicode')->nullable();
            $table->string('common_laundry')->nullable();
            $table->string('pets_allowed')->nullable();
            $table->string('wiring_closet')->nullable();
            $table->string('computer_network')->nullable();
            $table->string('dropped_ceiling')->nullable();
            $table->string('fire_sprinkler_system')->nullable();
            $table->string('wharf')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services');
    }
}
