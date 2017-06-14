<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ApimoPropertyProximity extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apimo_property_proximity', function (Blueprint $table) {
            $table->integer('reference');
            $table->string('locale');
            $table->string('value');
            $table->string('value_plurial')->nullable();
        });

        DB::table('apimo_property_proximity')->insert(
            [
                [
                    'reference' => 1,
                    'locale' => 'fr_FR',
                    'value' => 'Bus',
                ],
                [
                    'reference' => 2,
                    'locale' => 'fr_FR',
                    'value' => 'Gare routière',
                ],
                [
                    'reference' => 3,
                    'locale' => 'fr_FR',
                    'value' => 'Métro',
                ],
                [
                    'reference' => 4,
                    'locale' => 'fr_FR',
                    'value' => 'Commerces',
                ],
                [
                    'reference' => 5,
                    'locale' => 'fr_FR',
                    'value' => 'École primaire',
                ],
                [
                    'reference' => 6,
                    'locale' => 'fr_FR',
                    'value' => 'Plage',
                ],
                [
                    'reference' => 7,
                    'locale' => 'fr_FR',
                    'value' => 'Centre ville',
                ],
                [
                    'reference' => 8,
                    'locale' => 'fr_FR',
                    'value' => 'Hôpital/clinique',
                ],
                [
                    'reference' => 9,
                    'locale' => 'fr_FR',
                    'value' => 'Médecin',
                ],
                [
                    'reference' => 10,
                    'locale' => 'fr_FR',
                    'value' => 'Tramway',
                ],
                [
                    'reference' => 11,
                    'locale' => 'fr_FR',
                    'value' => 'Gare',
                ],
                [
                    'reference' => 12,
                    'locale' => 'fr_FR',
                    'value' => 'Taxi',
                ],
                [
                    'reference' => 13,
                    'locale' => 'fr_FR',
                    'value' => 'Parking public',
                ],
                [
                    'reference' => 14,
                    'locale' => 'fr_FR',
                    'value' => 'Parc',
                ],
                [
                    'reference' => 15,
                    'locale' => 'fr_FR',
                    'value' => 'Supermarché',
                ],
                [
                    'reference' => 16,
                    'locale' => 'fr_FR',
                    'value' => 'Port',
                ],
                [
                    'reference' => 17,
                    'locale' => 'fr_FR',
                    'value' => 'Crèche',
                ],
                [
                    'reference' => 18,
                    'locale' => 'fr_FR',
                    'value' => 'Piscine',
                ],
                [
                    'reference' => 19,
                    'locale' => 'fr_FR',
                    'value' => 'Tennis',
                ],
                [
                    'reference' => 20,
                    'locale' => 'fr_FR',
                    'value' => 'Golf',
                ],
                [
                    'reference' => 21,
                    'locale' => 'fr_FR',
                    'value' => 'Cinéma',
                ],
                [
                    'reference' => 23,
                    'locale' => 'fr_FR',
                    'value' => 'École secondaire',
                ],
                [
                    'reference' => 24,
                    'locale' => 'fr_FR',
                    'value' => 'Salle de sport',
                ],
                [
                    'reference' => 25,
                    'locale' => 'fr_FR',
                    'value' => 'Aéroport',
                ],
                [
                    'reference' => 26,
                    'locale' => 'fr_FR',
                    'value' => 'Pistes de ski',
                ],
                [
                    'reference' => 27,
                    'locale' => 'fr_FR',
                    'value' => 'Mer',
                ],
                [
                    'reference' => 28,
                    'locale' => 'fr_FR',
                    'value' => 'Gare TGV',
                ],
                [
                    'reference' => 29,
                    'locale' => 'fr_FR',
                    'value' => 'Autoroute',
                ],
                [
                    'reference' => 30,
                    'locale' => 'fr_FR',
                    'value' => 'Université',
                ],
                [
                    'reference' => 31,
                    'locale' => 'fr_FR',
                    'value' => 'Palais des congrès',
                ],
                [
                    'reference' => 32,
                    'locale' => 'fr_FR',
                    'value' => 'Lac',
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
        Schema::dropIfExists('apimo_property_proximity');
    }
}
