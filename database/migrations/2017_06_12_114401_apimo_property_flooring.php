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
