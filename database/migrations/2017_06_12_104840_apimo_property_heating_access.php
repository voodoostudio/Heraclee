<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ApimoPropertyHeatingAccess extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apimo_property_heating_access', function (Blueprint $table) {
            $table->integer('reference');
            $table->string('locale');
            $table->string('value');
            $table->string('value_plurial')->nullable();
        });

        DB::table('apimo_property_heating_access')->insert(
            [
                [
                    'reference' => 1,
                    'locale' => 'fr_FR',
                    'value' => 'Individuel',
                ],
                [
                    'reference' => 2,
                    'locale' => 'fr_FR',
                    'value' => 'Collectif',
                ],
                [
                    'reference' => 3,
                    'locale' => 'fr_FR',
                    'value' => 'Mixte',
                ],
                [
                    'reference' => 4,
                    'locale' => 'fr_FR',
                    'value' => 'Réseau de chaleur',
                ],
                [
                    'reference' => 1,
                    'locale' => 'en_GB',
                    'value' => 'Individual',
                ],
                [
                    'reference' => 2,
                    'locale' => 'en_GB',
                    'value' => 'Common',
                ],
                [
                    'reference' => 3,
                    'locale' => 'en_GB',
                    'value' => 'Mixed',
                ],
                [
                    'reference' => 4,
                    'locale' => 'en_GB',
                    'value' => 'District heating',
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
        Schema::dropIfExists('apimo_property_heating_access');
    }
}
