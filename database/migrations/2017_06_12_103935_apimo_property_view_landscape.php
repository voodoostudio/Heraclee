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
