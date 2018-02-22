<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ApimoProperties extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apimo_properties', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('property_id');
            $table->string('agency', 256)->nullable();
            $table->string('reference')->nullable();
            $table->string('status')->nullable();
            $table->integer('user');
            $table->integer('step');
            $table->integer('parent')->nullable();
            $table->integer('category');
            $table->integer('subcategory');
            $table->string('name')->nullable();
            $table->integer('type');
            $table->integer('subtype');
            $table->integer('agreement')->nullable();
            $table->string('block_name')->nullable();
            $table->string('address')->nullable();
            $table->string('address_more')->nullable();
            $table->boolean('publish_address')->nullable();
            $table->string('country')->nullable();
            $table->integer('city')->nullable();
            $table->integer('district')->nullable();
            $table->float('longitude')->nullable();
            $table->float('latitude')->nullable();
            $table->integer('radius');
            $table->integer('area');
            $table->integer('rooms')->nullable();
            $table->integer('bedrooms')->nullable();
            $table->integer('sleeps')->nullable();
            $table->integer('price');
            $table->integer('price_max');
            $table->string('price_period', 50);
            $table->string('residence')->nullable();
            $table->string('view')->nullable();
            $table->string('landscape')->nullable();
            $table->string('floor')->nullable();
            $table->string('heating')->nullable();
            $table->string('water')->nullable();
            $table->integer('condition')->nullable();
            $table->integer('standing')->nullable();
            $table->string('style')->nullable();
            $table->string('construction_year')->nullable();
            $table->string('renovation_year')->nullable();
            $table->string('available_at')->nullable();
            $table->string('delivered_at')->nullable();
            $table->string('activities')->nullable();
            $table->string('orientations')->nullable();
            $table->string('services')->nullable();
            $table->string('proximities')->nullable();
            $table->string('tags')->nullable();
            $table->string('tags_customized')->nullable();
            $table->text('pictures')->nullable();
            $table->string('areas', 1024)->nullable();
            $table->string('regulations')->nullable();
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
        Schema::dropIfExists('apimo_properties');
    }
}
