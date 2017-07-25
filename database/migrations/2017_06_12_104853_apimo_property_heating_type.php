<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ApimoPropertyHeatingType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apimo_property_heating_type', function (Blueprint $table) {
            $table->integer('reference');
            $table->string('locale');
            $table->string('value');
            $table->string('value_plurial')->nullable();
        });

        DB::table('apimo_property_heating_type')->insert(
            [
                [
                    'reference' => 1,
                    'locale' => 'fr_FR',
                    'value' => 'Gaz',
                ],
                [
                    'reference' => 2,
                    'locale' => 'fr_FR',
                    'value' => 'Fioul / Mazout',
                ],
                [
                    'reference' => 3,
                    'locale' => 'fr_FR',
                    'value' => 'Electrique',
                ],
                [
                    'reference' => 4,
                    'locale' => 'fr_FR',
                    'value' => 'Bois',
                ],
                [
                    'reference' => 5,
                    'locale' => 'fr_FR',
                    'value' => 'Solaire',
                ],
                [
                    'reference' => 6,
                    'locale' => 'fr_FR',
                    'value' => 'Charbon',
                ],
                [
                    'reference' => 7,
                    'locale' => 'fr_FR',
                    'value' => 'Pompe à chaleur',
                ],
                [
                    'reference' => 8,
                    'locale' => 'fr_FR',
                    'value' => 'Géothermie',
                ],
                [
                    'reference' => 9,
                    'locale' => 'fr_FR',
                    'value' => 'Granulé de bois',
                ],
                [
                    'reference' => 10,
                    'locale' => 'fr_FR',
                    'value' => 'Eau chaude',
                ],
                [
                    'reference' => 1,
                    'locale' => 'en_GB',
                    'value' => 'Gas',
                ],
                [
                    'reference' => 2,
                    'locale' => 'en_GB',
                    'value' => 'Fuel oil',
                ],
                [
                    'reference' => 3,
                    'locale' => 'en_GB',
                    'value' => 'Electric',
                ],
                [
                    'reference' => 4,
                    'locale' => 'en_GB',
                    'value' => 'Wood',
                ],
                [
                    'reference' => 5,
                    'locale' => 'en_GB',
                    'value' => 'Solar',
                ],
                [
                    'reference' => 6,
                    'locale' => 'en_GB',
                    'value' => 'Charcoal',
                ],
                [
                    'reference' => 7,
                    'locale' => 'en_GB',
                    'value' => 'Heat pump',
                ],
                [
                    'reference' => 8,
                    'locale' => 'en_GB',
                    'value' => 'Geothermal',
                ],
                [
                    'reference' => 9,
                    'locale' => 'en_GB',
                    'value' => 'Wood pellet',
                ],
                [
                    'reference' => 10,
                    'locale' => 'en_GB',
                    'value' => 'Hot water',
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
        Schema::dropIfExists('apimo_property_heating_type');
    }
}
