<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ApimoPropertyAdjacency extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apimo_property_adjacency', function (Blueprint $table) {
            $table->integer('reference');
            $table->string('locale');
            $table->string('value');
            $table->string('value_plurial')->nullable();
        });

        DB::table('apimo_property_adjacency')->insert(
            [
                [
                    'reference' => 1,
                    'locale' => 'fr_FR',
                    'value' => 'Individuelle',
                ],
                [
                    'reference' => 2,
                    'locale' => 'fr_FR',
                    'value' => 'Jumelée',
                ],
                [
                    'reference' => 3,
                    'locale' => 'fr_FR',
                    'value' => 'Jumelée par garage',
                ],
                [
                    'reference' => 4,
                    'locale' => 'fr_FR',
                    'value' => 'Maison de village',
                ],
                [
                    'reference' => 5,
                    'locale' => 'fr_FR',
                    'value' => 'Jumelée d\'angle',
                ],
                [
                    'reference' => 6,
                    'locale' => 'fr_FR',
                    'value' => 'En bande',
                ],
                [
                    'reference' => 1,
                    'locale' => 'en_GB',
                    'value' => 'Single',
                ],
                [
                    'reference' => 2,
                    'locale' => 'en_GB',
                    'value' => 'Twin',
                ],
                [
                    'reference' => 3,
                    'locale' => 'en_GB',
                    'value' => 'Twin by garage',
                ],
                [
                    'reference' => 4,
                    'locale' => 'en_GB',
                    'value' => 'Village house',
                ],
                [
                    'reference' => 5,
                    'locale' => 'en_GB',
                    'value' => 'Twin by angle',
                ],
                [
                    'reference' => 6,
                    'locale' => 'en_GB',
                    'value' => 'Ranged',
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
        Schema::dropIfExists('apimo_property_adjacency');
    }
}
