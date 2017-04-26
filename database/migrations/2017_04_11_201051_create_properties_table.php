<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('app_id')->nullable();
            $table->string('reference');
            $table->integer('user_id');
            $table->integer('step');
            $table->integer('status');
            $table->integer('group');
            $table->integer('parent')->nullable();
            $table->integer('category');
            $table->integer('subcategory');
            $table->integer('name')->nullable();
            $table->integer('type');
            $table->integer('subtype');
            $table->integer('agreement_id')->nullable();
            $table->string('block_name')->nullable();
            $table->string('address')->nullable();
            $table->string('address_more')->nullable();
            $table->boolean('publish_address')->default(0);
            $table->string('country');
            $table->integer('city_id')->nullable();
            $table->integer('district_id')->nullable();
            $table->float('longitude')->nullable();
            $table->float('latitude')->nullable();
            $table->float('radius')->nullable();
            $table->integer('area_id')->nullable();
            $table->integer('rooms');
            $table->integer('bedrooms')->default(0);
            $table->integer('sleeps')->nullable();
            $table->integer('price_id');
            $table->string('owner')->nullable();
            $table->string('visit')->nullable();
            $table->integer('residence_id');
            $table->integer('view_id');
            $table->integer('floor_id');
            $table->integer('heating_id');
            $table->integer('water_id');
            $table->string('condition')->nullable();
            $table->string('standing')->nullable();
            $table->integer('style_id');
            $table->integer('construction_year')->nullable();
            $table->integer('renovation_year')->nullable();
            $table->integer('available_at')->nullable();
            $table->integer('delivered_at')->nullable();
            $table->integer('activities_id');
            $table->integer('orientations_id');
            $table->integer('services_id');
            $table->integer('proximities_id');
            $table->integer('tags_id');
            $table->integer('tags_customized_id');
            $table->integer('pictures_id');
            $table->integer('medias_id');
            $table->integer('comments_id');
            $table->integer('areas_id');
            $table->integer('regulations_id');
            $table->integer('providers_id');
            $table->integer('filling_rate')->nullable();

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
        Schema::dropIfExists('properties');
    }
}
