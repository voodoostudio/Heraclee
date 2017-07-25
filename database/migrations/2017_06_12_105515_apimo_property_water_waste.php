<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ApimoPropertyWaterWaste extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apimo_property_water_waste', function (Blueprint $table) {
            $table->integer('reference');
            $table->string('locale');
            $table->string('value');
            $table->string('value_plurial')->nullable();
        });

        DB::table('apimo_property_water_waste')->insert(
            [
                [
                    'reference' => 1,
                    'locale' => 'fr_FR',
                    'value' => 'Fosse septique',
                ],
                [
                    'reference' => 2,
                    'locale' => 'fr_FR',
                    'value' => 'Tout à l\'égout',
                ],
                [
                    'reference' => 3,
                    'locale' => 'fr_FR',
                    'value' => 'Station d\'épuration',
                ],
                [
                    'reference' => 1,
                    'locale' => 'en_GB',
                    'value' => 'Septic tank',
                ],
                [
                    'reference' => 2,
                    'locale' => 'en_GB',
                    'value' => 'Main drainage',
                ],
                [
                    'reference' => 3,
                    'locale' => 'en_GB',
                    'value' => 'Treatment plant',
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
        Schema::dropIfExists('apimo_property_water_waste');
    }
}
