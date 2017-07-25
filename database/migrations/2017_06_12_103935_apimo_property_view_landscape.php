<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ApimoPropertyViewLandscape extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'apimo_property_view_landscape',
            function (Blueprint $table) {
                $table->integer('reference');
                $table->string('locale');
                $table->string('value');
                $table->string('value_plurial')->nullable();
            }
        );

        DB::table('apimo_property_view_landscape')->insert(
            [
                [
                    'reference' => 1,
                    'locale' => 'fr_FR',
                    'value' => 'Mer',
                ],
                [
                    'reference' => 2,
                    'locale' => 'fr_FR',
                    'value' => 'Montagnes',
                ],
                [
                    'reference' => 3,
                    'locale' => 'fr_FR',
                    'value' => 'Collines',
                ],
                [
                    'reference' => 4,
                    'locale' => 'fr_FR',
                    'value' => 'Verdure',
                ],
                [
                    'reference' => 5,
                    'locale' => 'fr_FR',
                    'value' => 'Monument',
                ],
                [
                    'reference' => 6,
                    'locale' => 'fr_FR',
                    'value' => 'Forêt',
                ],
                [
                    'reference' => 8,
                    'locale' => 'fr_FR',
                    'value' => 'Ville',
                ],
                [
                    'reference' => 9,
                    'locale' => 'fr_FR',
                    'value' => 'Campagne',
                ],
                [
                    'reference' => 10,
                    'locale' => 'fr_FR',
                    'value' => 'Village',
                ],
                [
                    'reference' => 11,
                    'locale' => 'fr_FR',
                    'value' => 'Parc',
                ],
                [
                    'reference' => 12,
                    'locale' => 'fr_FR',
                    'value' => 'Jardin',
                ],
                [
                    'reference' => 13,
                    'locale' => 'fr_FR',
                    'value' => 'Ciel',
                ],
                [
                    'reference' => 14,
                    'locale' => 'fr_FR',
                    'value' => 'Cour',
                ],
                [
                    'reference' => 16,
                    'locale' => 'fr_FR',
                    'value' => 'Port',
                ],
                [
                    'reference' => 17,
                    'locale' => 'fr_FR',
                    'value' => 'Rue',
                ],
                [
                    'reference' => 18,
                    'locale' => 'fr_FR',
                    'value' => 'Lac',
                ],
                [
                    'reference' => 19,
                    'locale' => 'fr_FR',
                    'value' => 'Pistes de ski',
                ],
                [
                    'reference' => 20,
                    'locale' => 'fr_FR',
                    'value' => 'Piscine',
                ],
                [
                    'reference' => 1,
                    'locale' => 'en_GB',
                    'value' => 'Sea',
                ],
                [
                    'reference' => 2,
                    'locale' => 'en_GB',
                    'value' => 'Mountains',
                ],
                [
                    'reference' => 3,
                    'locale' => 'en_GB',
                    'value' => 'Hills',
                ],
                [
                    'reference' => 4,
                    'locale' => 'en_GB',
                    'value' => 'Greenery',
                ],
                [
                    'reference' => 5,
                    'locale' => 'en_GB',
                    'value' => 'Monument',
                ],
                [
                    'reference' => 6,
                    'locale' => 'en_GB',
                    'value' => 'Forest',
                ],
                [
                    'reference' => 8,
                    'locale' => 'en_GB',
                    'value' => 'City',
                ],
                [
                    'reference' => 9,
                    'locale' => 'en_GB',
                    'value' => 'Countryside',
                ],
                [
                    'reference' => 10,
                    'locale' => 'en_GB',
                    'value' => 'Village',
                ],
                [
                    'reference' => 11,
                    'locale' => 'en_GB',
                    'value' => 'Park',
                ],
                [
                    'reference' => 12,
                    'locale' => 'en_GB',
                    'value' => 'Garden',
                ],
                [
                    'reference' => 13,
                    'locale' => 'en_GB',
                    'value' => 'Sky',
                ],
                [
                    'reference' => 14,
                    'locale' => 'en_GB',
                    'value' => 'Courtyard',
                ],
                [
                    'reference' => 16,
                    'locale' => 'en_GB',
                    'value' => 'Harbor',
                ],
                [
                    'reference' => 17,
                    'locale' => 'en_GB',
                    'value' => 'Street',
                ],
                [
                    'reference' => 18,
                    'locale' => 'en_GB',
                    'value' => 'Lake',
                ],
                [
                    'reference' => 19,
                    'locale' => 'en_GB',
                    'value' => 'Ski slopes',
                ],
                [
                    'reference' => 20,
                    'locale' => 'en_GB',
                    'value' => 'Swimming pool',
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
        Schema::dropIfExists('apimo_property_view_landscape');
    }
}
