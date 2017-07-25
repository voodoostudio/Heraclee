<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ApimoPropertyFlooring extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apimo_property_flooring', function (Blueprint $table) {
            $table->integer('reference');
            $table->string('locale');
            $table->string('value');
            $table->string('value_plurial')->nullable();
        });

        DB::table('apimo_property_flooring')->insert(
            [
                [
                    'reference' => 1,
                    'locale' => 'fr_FR',
                    'value' => 'Parquet',
                ],
                [
                    'reference' => 2,
                    'locale' => 'fr_FR',
                    'value' => 'Carrelage',
                ],
                [
                    'reference' => 3,
                    'locale' => 'fr_FR',
                    'value' => 'Lino',
                ],
                [
                    'reference' => 4,
                    'locale' => 'fr_FR',
                    'value' => 'Moquette',
                ],
                [
                    'reference' => 5,
                    'locale' => 'fr_FR',
                    'value' => 'Béton',
                ],
                [
                    'reference' => 6,
                    'locale' => 'fr_FR',
                    'value' => 'Fibre végétale',
                ],
                [
                    'reference' => 7,
                    'locale' => 'fr_FR',
                    'value' => 'Coco',
                ],
                [
                    'reference' => 8,
                    'locale' => 'fr_FR',
                    'value' => 'Travertin',
                ],
                [
                    'reference' => 9,
                    'locale' => 'fr_FR',
                    'value' => 'Marbre',
                ],
                [
                    'reference' => 10,
                    'locale' => 'fr_FR',
                    'value' => 'Granito',
                ],
                [
                    'reference' => 11,
                    'locale' => 'fr_FR',
                    'value' => 'Terre cuite',
                ],
                [
                    'reference' => 12,
                    'locale' => 'fr_FR',
                    'value' => 'Teck',
                ],
                [
                    'reference' => 13,
                    'locale' => 'fr_FR',
                    'value' => 'Mosaïque',
                ],
                [
                    'reference' => 14,
                    'locale' => 'fr_FR',
                    'value' => 'Terre battue',
                ],
                [
                    'reference' => 15,
                    'locale' => 'fr_FR',
                    'value' => 'Pierre',
                ],
                [
                    'reference' => 16,
                    'locale' => 'fr_FR',
                    'value' => 'Stratifié',
                ],
                [
                    'reference' => 17,
                    'locale' => 'fr_FR',
                    'value' => 'Vinyle / PVC',
                ],
                [
                    'reference' => 1,
                    'locale' => 'en_GB',
                    'value' => 'Wood floors',
                ],
                [
                    'reference' => 2,
                    'locale' => 'en_GB',
                    'value' => 'Tile',
                ],
                [
                    'reference' => 3,
                    'locale' => 'en_GB',
                    'value' => 'Vinyl composition tile',
                ],
                [
                    'reference' => 4,
                    'locale' => 'en_GB',
                    'value' => 'Carpet',
                ],
                [
                    'reference' => 5,
                    'locale' => 'en_GB',
                    'value' => 'Concrete',
                ],
                [
                    'reference' => 6,
                    'locale' => 'en_GB',
                    'value' => 'Natural fiber',
                ],
                [
                    'reference' => 7,
                    'locale' => 'en_GB',
                    'value' => 'Coco',
                ],
                [
                    'reference' => 8,
                    'locale' => 'en_GB',
                    'value' => 'Travertine',
                ],
                [
                    'reference' => 9,
                    'locale' => 'en_GB',
                    'value' => 'Marble',
                ],
                [
                    'reference' => 10,
                    'locale' => 'en_GB',
                    'value' => 'Granite',
                ],
                [
                    'reference' => 11,
                    'locale' => 'en_GB',
                    'value' => 'Terracotta tile',
                ],
                [
                    'reference' => 12,
                    'locale' => 'en_GB',
                    'value' => 'Teak',
                ],
                [
                    'reference' => 13,
                    'locale' => 'en_GB',
                    'value' => 'Mosaïc',
                ],
                [
                    'reference' => 14,
                    'locale' => 'en_GB',
                    'value' => 'Clay',
                ],
                [
                    'reference' => 15,
                    'locale' => 'en_GB',
                    'value' => 'Stone',
                ],
                [
                    'reference' => 16,
                    'locale' => 'en_GB',
                    'value' => 'Laminate',
                ],
                [
                    'reference' => 17,
                    'locale' => 'en_GB',
                    'value' => 'Vinyl composition tile',
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
        Schema::dropIfExists('apimo_property_flooring');
    }
}
