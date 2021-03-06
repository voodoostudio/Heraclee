<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ApimoPropertyPeriod extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apimo_property_period', function (Blueprint $table) {
            $table->integer('reference');
            $table->string('locale');
            $table->string('value');
            $table->string('value_plurial')->nullable();
        });

        DB::table('apimo_property_period')->insert(
            [
                [
                    'reference' => 1,
                    'locale' => 'fr_FR',
                    'value' => 'Jour',
                ],
                [
                    'reference' => 2,
                    'locale' => 'fr_FR',
                    'value' => 'Semaine',
                ],
                [
                    'reference' => 3,
                    'locale' => 'fr_FR',
                    'value' => 'Quinzaine',
                ],
                [
                    'reference' => 4,
                    'locale' => 'fr_FR',
                    'value' => 'Mois',
                ],
                [
                    'reference' => 5,
                    'locale' => 'fr_FR',
                    'value' => 'Trimestre',
                ],
                [
                    'reference' => 6,
                    'locale' => 'fr_FR',
                    'value' => 'Bimensuel',
                ],
                [
                    'reference' => 7,
                    'locale' => 'fr_FR',
                    'value' => 'An',
                ],
                [
                    'reference' => 1,
                    'locale' => 'en_GB',
                    'value' => 'Day',
                ],
                [
                    'reference' => 2,
                    'locale' => 'en_GB',
                    'value' => 'Week',
                ],
                [
                    'reference' => 3,
                    'locale' => 'en_GB',
                    'value' => 'Fortnight',
                ],
                [
                    'reference' => 4,
                    'locale' => 'en_GB',
                    'value' => 'Month',
                ],
                [
                    'reference' => 5,
                    'locale' => 'en_GB',
                    'value' => 'Bimonthly',
                ],
                [
                    'reference' => 6,
                    'locale' => 'en_GB',
                    'value' => 'Half-yearly',
                ],
                [
                    'reference' => 7,
                    'locale' => 'en_GB',
                    'value' => 'Yearly',
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
        Schema::dropIfExists('apimo_property_period');
    }
}
