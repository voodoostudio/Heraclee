<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ApimoPropertyViewType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apimo_property_view_type', function (Blueprint $table) {
            $table->integer('reference');
            $table->string('locale');
            $table->string('value');
            $table->string('value_plurial')->nullable();
        });

        DB::table('apimo_property_view_type')->insert(
            [
                [
                    'reference' => 1,
                    'locale' => 'fr_FR',
                    'value' => 'Vis-à-vis',
                ],
                [
                    'reference' => 2,
                    'locale' => 'fr_FR',
                    'value' => 'Aperçu',
                ],
                [
                    'reference' => 3,
                    'locale' => 'fr_FR',
                    'value' => 'Dégagée',
                ],
                [
                    'reference' => 4,
                    'locale' => 'fr_FR',
                    'value' => 'Panoramique',
                ],
                [
                    'reference' => 1,
                    'locale' => 'en_GB',
                    'value' => 'Obstructed',
                ],
                [
                    'reference' => 2,
                    'locale' => 'en_GB',
                    'value' => 'Slight',
                ],
                [
                    'reference' => 3,
                    'locale' => 'en_GB',
                    'value' => 'Unobstructed',
                ],
                [
                    'reference' => 4,
                    'locale' => 'en_GB',
                    'value' => 'Panoramic',
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
        Schema::dropIfExists('apimo_property_view_type');
    }
}
