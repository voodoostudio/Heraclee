<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ApimoPropertyBuilding extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apimo_property_building', function (Blueprint $table) {
            $table->integer('reference');
            $table->string('locale');
            $table->string('value');
            $table->string('value_plurial')->nullable();
        });

        DB::table('apimo_property_building')->insert(
            [
                [
                    'reference' => 1,
                    'locale' => 'fr_FR',
                    'value' => 'Immeuble',
                ],
                [
                    'reference' => 2,
                    'locale' => 'fr_FR',
                    'value' => 'Résidence',
                ],
                [
                    'reference' => 3,
                    'locale' => 'fr_FR',
                    'value' => 'Lotissement',
                ],
                [
                    'reference' => 4,
                    'locale' => 'fr_FR',
                    'value' => 'Hameau',
                ],
                [
                    'reference' => 5,
                    'locale' => 'fr_FR',
                    'value' => 'Domaine',
                ],
                [
                    'reference' => 6,
                    'locale' => 'fr_FR',
                    'value' => 'Propriété',
                ],
                [
                    'reference' => 7,
                    'locale' => 'fr_FR',
                    'value' => 'Rue / Avenue / Chemin ...',
                ],
                [
                    'reference' => 1,
                    'locale' => 'en_GB',
                    'value' => 'Building',
                ],
                [
                    'reference' => 2,
                    'locale' => 'en_GB',
                    'value' => 'Residence',
                ],
                [
                    'reference' => 3,
                    'locale' => 'en_GB',
                    'value' => 'Housing scheme',
                ],
                [
                    'reference' => 4,
                    'locale' => 'en_GB',
                    'value' => 'Hamlet',
                ],
                [
                    'reference' => 5,
                    'locale' => 'en_GB',
                    'value' => 'Domain',
                ],
                [
                    'reference' => 6,
                    'locale' => 'en_GB',
                    'value' => 'Property',
                ],
                [
                    'reference' => 7,
                    'locale' => 'en_GB',
                    'value' => 'Street',
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
        Schema::dropIfExists('apimo_property_building');
    }
}
