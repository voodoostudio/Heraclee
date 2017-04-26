<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('self_employed')->nullable();
            $table->string('bakery')->nullable();
            $table->string('restaurant')->nullable();
            $table->string('press')->nullable();
            $table->string('bar')->nullable();
            $table->string('florist')->nullable();
            $table->string('tobacconist')->nullable();
            $table->string('clothes')->nullable();
            $table->string('chemist')->nullable();
            $table->string('shopping_centre')->nullable();
            $table->string('travel_agency')->nullable();
            $table->string('real_estate_agent')->nullable();
            $table->string('gallery')->nullable();
            $table->string('garage')->nullable();
            $table->string('insurer')->nullable();
            $table->string('optician')->nullable();
            $table->string('perfumery')->nullable();
            $table->string('hotel')->nullable();
            $table->string('antique_dealer')->nullable();
            $table->string('laundry')->nullable();
            $table->string('pressing')->nullable();
            $table->string('jeweller')->nullable();
            $table->string('grocer')->nullable();
            $table->string('butcher')->nullable();
            $table->string('caterer')->nullable();
            $table->string('brewery')->nullable();
            $table->string('snack')->nullable();
            $table->string('confectioner')->nullable();
            $table->string('pork_butcher')->nullable();
            $table->string('grocery')->nullable();
            $table->string('cheesemonger')->nullable();
            $table->string('fruit_and_vegetables')->nullable();
            $table->string('sex_shop')->nullable();
            $table->string('video_game')->nullable();
            $table->string('computer')->nullable();
            $table->string('hairdresser')->nullable();
            $table->string('cosmetician')->nullable();
            $table->string('household_electrical')->nullable();
            $table->string('shoes')->nullable();
            $table->string('haberdasher')->nullable();
            $table->string('groomer')->nullable();
            $table->string('tea_room')->nullable();
            $table->string('beach')->nullable();
            $table->string('bookshop')->nullable();
            $table->string('offices')->nullable();
            $table->string('gas_station')->nullable();
            $table->string('camping')->nullable();
            $table->string('nightclub')->nullable();
            $table->string('pet_store')->nullable();
            $table->string('video_arcade')->nullable();
            $table->string('office_supplies')->nullable();
            $table->string('furniture')->nullable();
            $table->string('decoration')->nullable();
            $table->string('agriculture')->nullable();
            $table->string('photo')->nullable();
            $table->string('drugstore')->nullable();
            $table->string('locksmith')->nullable();
            $table->string('health_club')->nullable();
            $table->string('taxi')->nullable();
            $table->string('cinema')->nullable();
            $table->string('theater')->nullable();
            $table->string('cafe')->nullable();
            $table->string('garden_centre')->nullable();
            $table->string('hardware_shop')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activities');
    }
}
