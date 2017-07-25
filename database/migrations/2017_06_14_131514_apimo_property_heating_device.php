<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ApimoPropertyHeatingDevice extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apimo_property_heating_device', function (Blueprint $table) {
            $table->integer('reference');
            $table->string('locale');
            $table->string('value');
            $table->string('value_plurial')->nullable();
        });

        DB::table('apimo_property_heating_device')->insert(
            [
                [
                    'reference' => 1,
                    'locale' => 'fr_FR',
                    'value' => 'Convecteur',
                ],
                [
                    'reference' => 2,
                    'locale' => 'fr_FR',
                    'value' => 'Au sol',
                ],
                [
                    'reference' => 3,
                    'locale' => 'fr_FR',
                    'value' => 'Radiateur',
                ],
                [
                    'reference' => 4,
                    'locale' => 'fr_FR',
                    'value' => 'Poêle',
                ],
                [
                    'reference' => 5,
                    'locale' => 'fr_FR',
                    'value' => 'Climatisation',
                ],
                [
                    'reference' => 6,
                    'locale' => 'fr_FR',
                    'value' => 'Central',
                ],
                [
                    'reference' => 1,
                    'locale' => 'en_GB',
                    'value' => 'Convector',
                ],
                [
                    'reference' => 2,
                    'locale' => 'en_GB',
                    'value' => 'Radiant',
                ],
                [
                    'reference' => 3,
                    'locale' => 'en_GB',
                    'value' => 'Radiator',
                ],
                [
                    'reference' => 4,
                    'locale' => 'en_GB',
                    'value' => 'Stove',
                ],
                [
                    'reference' => 5,
                    'locale' => 'en_GB',
                    'value' => 'Air-conditioning',
                ],
                [
                    'reference' => 6,
                    'locale' => 'en_GB',
                    'value' => 'Central',
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
        Schema::dropIfExists('apimo_property_heating_device');
    }
}
