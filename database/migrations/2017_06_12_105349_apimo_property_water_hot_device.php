<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ApimoPropertyWaterHotDevice extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apimo_property_water_hot_device', function (Blueprint $table) {
            $table->integer('reference');
            $table->string('locale');
            $table->string('value');
            $table->string('value_plurial')->nullable();
        });

        DB::table('apimo_property_water_hot_device')->insert(
            [
                [
                    'reference' => 1,
                    'locale' => 'fr_FR',
                    'value' => 'Solaire',
                ],
                [
                    'reference' => 2,
                    'locale' => 'fr_FR',
                    'value' => 'Chauffe-eau',
                ],
                [
                    'reference' => 3,
                    'locale' => 'fr_FR',
                    'value' => 'Chaudière',
                ],
                [
                    'reference' => 1,
                    'locale' => 'en_GB',
                    'value' => 'Solar',
                ],
                [
                    'reference' => 2,
                    'locale' => 'en_GB',
                    'value' => 'Hot water tank',
                ],
                [
                    'reference' => 3,
                    'locale' => 'en_GB',
                    'value' => 'Boiler',
                ],
            ]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('apimo_property_water_hot_device');
    }
}
