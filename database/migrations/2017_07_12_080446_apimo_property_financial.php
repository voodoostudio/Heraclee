<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ApimoPropertyFinancial extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apimo_property_financial', function (Blueprint $table) {
            $table->integer('reference');
            $table->string('locale');
            $table->string('value');
            $table->string('value_plurial')->nullable();
        });

        DB::table('apimo_property_financial')->insert(
            [
                [
                    'reference' => 1,
                    'locale' => 'fr_FR',
                    'value' => 'Chiffre d\'affaires',
                ],
                [
                    'reference' => 2,
                    'locale' => 'fr_FR',
                    'value' => 'Résultat net',
                ],
                [
                    'reference' => 3,
                    'locale' => 'fr_FR',
                    'value' => 'Excédent brut d\'exploitation',
                ],
                [
                    'reference' => 4,
                    'locale' => 'fr_FR',
                    'value' => 'Coûts de personnel',
                ],
                [
                    'reference' => 5,
                    'locale' => 'fr_FR',
                    'value' => 'Capacité d\'autofinancement',
                ],
                [
                    'reference' => 6,
                    'locale' => 'fr_FR',
                    'value' => 'Capitaux propres',
                ],
                [
                    'reference' => 7,
                    'locale' => 'fr_FR',
                    'value' => 'Dettes financières nettes',
                ],
                [
                    'reference' => 1,
                    'locale' => 'en_GB',
                    'value' => 'Turnover',
                ],
                [
                    'reference' => 2,
                    'locale' => 'en_GB',
                    'value' => 'Net income',
                ],
                [
                    'reference' => 3,
                    'locale' => 'en_GB',
                    'value' => 'Gross operating profit',
                ],
                [
                    'reference' => 4,
                    'locale' => 'en_GB',
                    'value' => 'Personnel costs',
                ],
                [
                    'reference' => 5,
                    'locale' => 'en_GB',
                    'value' => 'Cash flow',
                ],
                [
                    'reference' => 6,
                    'locale' => 'en_GB',
                    'value' => 'Shareholders’equity',
                ],
                [
                    'reference' => 7,
                    'locale' => 'en_GB',
                    'value' => 'Net debt',
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
        Schema::dropIfExists('apimo_property_financial');
    }
}
