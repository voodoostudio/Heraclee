<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ApimoPropertyStep extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'apimo_property_step',
            function (Blueprint $table) {
                $table->integer('reference');
                $table->string('locale');
                $table->string('value');
                $table->string('value_plurial')->nullable();
            }
        );

        DB::table('apimo_property_step')->insert(
            [
                [
                    'reference' => 1,
                    'locale' => 'en_GB',
                    'value' => 'In progress',
                ],
                [
                    'reference' => 2,
                    'locale' => 'en_GB',
                    'value' => 'Standby',
                ],
                [
                    'reference' => 3,
                    'locale' => 'en_GB',
                    'value' => 'Closed',
                ],
                [
                    'reference' => 4,
                    'locale' => 'en_GB',
                    'value' => 'Deleted',
                ],
                [
                    'reference' => 1,
                    'locale' => 'fr_FR',
                    'value' => 'En cours',
                ],
                [
                    'reference' => 2,
                    'locale' => 'fr_FR',
                    'value' => 'En attente',
                ],
                [
                    'reference' => 3,
                    'locale' => 'fr_FR',
                    'value' => 'Terminé',
                ],
                [
                    'reference' => 4,
                    'locale' => 'fr_FR',
                    'value' => 'Supprimé',
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
        Schema::dropIfExists('apimo_property_step');
    }
}
