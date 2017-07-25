<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ApimoPropertyFloor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apimo_property_floor', function (Blueprint $table) {
            $table->integer('reference');
            $table->string('locale');
            $table->string('value');
            $table->string('value_plurial')->nullable();
        });

        DB::table('apimo_property_floor')->insert(
            [
                [
                    'reference' => 1,
                    'locale' => 'fr_FR',
                    'value' => 'Rez-de-chaussée',
                ],
                [
                    'reference' => 2,
                    'locale' => 'fr_FR',
                    'value' => 'Dernier étage',
                ],
                [
                    'reference' => 3,
                    'locale' => 'fr_FR',
                    'value' => '1er',
                ],
                [
                    'reference' => 4,
                    'locale' => 'fr_FR',
                    'value' => '2ème',
                ],
                [
                    'reference' => 5,
                    'locale' => 'fr_FR',
                    'value' => '3ème',
                ],
                [
                    'reference' => 6,
                    'locale' => 'fr_FR',
                    'value' => '4ème',
                ],
                [
                    'reference' => 7,
                    'locale' => 'fr_FR',
                    'value' => '5ème',
                ],
                [
                    'reference' => 8,
                    'locale' => 'fr_FR',
                    'value' => '6ème',
                ],
                [
                    'reference' => 9,
                    'locale' => 'fr_FR',
                    'value' => '7ème',
                ],
                [
                    'reference' => 10,
                    'locale' => 'fr_FR',
                    'value' => '8ème',
                ],
                [
                    'reference' => 11,
                    'locale' => 'fr_FR',
                    'value' => '9ème',
                ],
                [
                    'reference' => 12,
                    'locale' => 'fr_FR',
                    'value' => '10ème',
                ],
                [
                    'reference' => 13,
                    'locale' => 'fr_FR',
                    'value' => '11ème',
                ],
                [
                    'reference' => 14,
                    'locale' => 'fr_FR',
                    'value' => '12ème',
                ],
                [
                    'reference' => 15,
                    'locale' => 'fr_FR',
                    'value' => '13ème',
                ],
                [
                    'reference' => 16,
                    'locale' => 'fr_FR',
                    'value' => '14ème',
                ],
                [
                    'reference' => 17,
                    'locale' => 'fr_FR',
                    'value' => '15ème',
                ],
                [
                    'reference' => 18,
                    'locale' => 'fr_FR',
                    'value' => '16ème',
                ],
                [
                    'reference' => 19,
                    'locale' => 'fr_FR',
                    'value' => '17ème',
                ],
                [
                    'reference' => 20,
                    'locale' => 'fr_FR',
                    'value' => '18ème',
                ],
                [
                    'reference' => 21,
                    'locale' => 'fr_FR',
                    'value' => '19ème',
                ],
                [
                    'reference' => 22,
                    'locale' => 'fr_FR',
                    'value' => '20ème',
                ],
                [
                    'reference' => 23,
                    'locale' => 'fr_FR',
                    'value' => 'Rez-de-jardin',
                ],
                [
                    'reference' => 24,
                    'locale' => 'fr_FR',
                    'value' => 'Entresol',
                ],
                [
                    'reference' => 25,
                    'locale' => 'fr_FR',
                    'value' => '-1',
                ],
                [
                    'reference' => 26,
                    'locale' => 'fr_FR',
                    'value' => '-2',
                ],
                [
                    'reference' => 27,
                    'locale' => 'fr_FR',
                    'value' => '-3',
                ],
                [
                    'reference' => 28,
                    'locale' => 'fr_FR',
                    'value' => '-4',
                ],
                [
                    'reference' => 29,
                    'locale' => 'fr_FR',
                    'value' => 'Sous-sol',
                ],
                [
                    'reference' => 30,
                    'locale' => 'fr_FR',
                    'value' => 'Plain-pied',
                ],
                [
                    'reference' => 31,
                    'locale' => 'fr_FR',
                    'value' => '21ème',
                ],
                [
                    'reference' => 32,
                    'locale' => 'fr_FR',
                    'value' => '22ème',
                ],
                [
                    'reference' => 33,
                    'locale' => 'fr_FR',
                    'value' => '23ème',
                ],
                [
                    'reference' => 34,
                    'locale' => 'fr_FR',
                    'value' => '24ème',
                ],
                [
                    'reference' => 35,
                    'locale' => 'fr_FR',
                    'value' => '25ème',
                ],
                [
                    'reference' => 36,
                    'locale' => 'fr_FR',
                    'value' => '26ème',
                ],
                [
                    'reference' => 37,
                    'locale' => 'fr_FR',
                    'value' => '27ème',
                ],
                [
                    'reference' => 38,
                    'locale' => 'fr_FR',
                    'value' => '28ème',
                ],
                [
                    'reference' => 39,
                    'locale' => 'fr_FR',
                    'value' => '29èmed',
                ],
                [
                    'reference' => 40,
                    'locale' => 'fr_FR',
                    'value' => '30ème',
                ],
                [
                    'reference' => 41,
                    'locale' => 'fr_FR',
                    'value' => '31ème',
                ],
                [
                    'reference' => 42,
                    'locale' => 'fr_FR',
                    'value' => '32ème',
                ],
                [
                    'reference' => 43,
                    'locale' => 'fr_FR',
                    'value' => '33ème',
                ],
                [
                    'reference' => 44,
                    'locale' => 'fr_FR',
                    'value' => '34ème',
                ],
                [
                    'reference' => 45,
                    'locale' => 'fr_FR',
                    'value' => '35ème',
                ],
                [
                    'reference' => 46,
                    'locale' => 'fr_FR',
                    'value' => '36ème',
                ],
                [
                    'reference' => 47,
                    'locale' => 'fr_FR',
                    'value' => '37ème',
                ],
                [
                    'reference' => 48,
                    'locale' => 'fr_FR',
                    'value' => '38ème',
                ],
                [
                    'reference' => 49,
                    'locale' => 'fr_FR',
                    'value' => '39ème',
                ],
                [
                    'reference' => 50,
                    'locale' => 'fr_FR',
                    'value' => '40ème',
                ],
                [
                    'reference' => 51,
                    'locale' => 'fr_FR',
                    'value' => '-5',
                ],
                [
                    'reference' => 52,
                    'locale' => 'fr_FR',
                    'value' => '-6',
                ],
                [
                    'reference' => 53,
                    'locale' => 'fr_FR',
                    'value' => '-7',
                ],
                [
                    'reference' => 54,
                    'locale' => 'fr_FR',
                    'value' => '-8',
                ],
                [
                    'reference' => 55,
                    'locale' => 'fr_FR',
                    'value' => '-9',
                ],
                [
                    'reference' => 56,
                    'locale' => 'fr_FR',
                    'value' => '-10',
                ],
                [
                    'reference' => 1,
                    'locale' => 'en_GB',
                    'value' => 'Ground floor',
                ],
                [
                    'reference' => 2,
                    'locale' => 'en_GB',
                    'value' => 'Top floor',
                ],
                [
                    'reference' => 3,
                    'locale' => 'en_GB',
                    'value' => '1st',
                ],
                [
                    'reference' => 4,
                    'locale' => 'en_GB',
                    'value' => '2nd',
                ],
                [
                    'reference' => 5,
                    'locale' => 'en_GB',
                    'value' => '3rd',
                ],
                [
                    'reference' => 6,
                    'locale' => 'en_GB',
                    'value' => '4th',
                ],
                [
                    'reference' => 7,
                    'locale' => 'en_GB',
                    'value' => '5th',
                ],
                [
                    'reference' => 8,
                    'locale' => 'en_GB',
                    'value' => '6th',
                ],
                [
                    'reference' => 9,
                    'locale' => 'en_GB',
                    'value' => '7th',
                ],
                [
                    'reference' => 10,
                    'locale' => 'en_GB',
                    'value' => '8th',
                ],
                [
                    'reference' => 11,
                    'locale' => 'en_GB',
                    'value' => '9th',
                ],
                [
                    'reference' => 12,
                    'locale' => 'en_GB',
                    'value' => '10th',
                ],
                [
                    'reference' => 13,
                    'locale' => 'en_GB',
                    'value' => '11th',
                ],
                [
                    'reference' => 14,
                    'locale' => 'en_GB',
                    'value' => '12th',
                ],
                [
                    'reference' => 15,
                    'locale' => 'en_GB',
                    'value' => '13th',
                ],
                [
                    'reference' => 16,
                    'locale' => 'en_GB',
                    'value' => '14th',
                ],
                [
                    'reference' => 17,
                    'locale' => 'en_GB',
                    'value' => '15th',
                ],
                [
                    'reference' => 18,
                    'locale' => 'en_GB',
                    'value' => '16th',
                ],
                [
                    'reference' => 19,
                    'locale' => 'en_GB',
                    'value' => '17th',
                ],
                [
                    'reference' => 20,
                    'locale' => 'en_GB',
                    'value' => '18th',
                ],
                [
                    'reference' => 21,
                    'locale' => 'en_GB',
                    'value' => '19th',
                ],
                [
                    'reference' => 22,
                    'locale' => 'en_GB',
                    'value' => '20th',
                ],
                [
                    'reference' => 23,
                    'locale' => 'en_GB',
                    'value' => 'Garden level',
                ],
                [
                    'reference' => 24,
                    'locale' => 'en_GB',
                    'value' => 'Split-level',
                ],
                [
                    'reference' => 25,
                    'locale' => 'en_GB',
                    'value' => '-1',
                ],
                [
                    'reference' => 26,
                    'locale' => 'en_GB',
                    'value' => '-2',
                ],
                [
                    'reference' => 27,
                    'locale' => 'en_GB',
                    'value' => '-3',
                ],
                [
                    'reference' => 28,
                    'locale' => 'en_GB',
                    'value' => '-4',
                ],
                [
                    'reference' => 29,
                    'locale' => 'en_GB',
                    'value' => 'Basement',
                ],
                [
                    'reference' => 30,
                    'locale' => 'en_GB',
                    'value' => 'Single-storey',
                ],
                [
                    'reference' => 31,
                    'locale' => 'en_GB',
                    'value' => '21th',
                ],
                [
                    'reference' => 32,
                    'locale' => 'en_GB',
                    'value' => '22th',
                ],
                [
                    'reference' => 33,
                    'locale' => 'en_GB',
                    'value' => '23th',
                ],
                [
                    'reference' => 34,
                    'locale' => 'en_GB',
                    'value' => '24ème',
                ],
                [
                    'reference' => 35,
                    'locale' => 'en_GB',
                    'value' => '25th',
                ],
                [
                    'reference' => 36,
                    'locale' => 'en_GB',
                    'value' => '26th',
                ],
                [
                    'reference' => 37,
                    'locale' => 'en_GB',
                    'value' => '27th',
                ],
                [
                    'reference' => 38,
                    'locale' => 'en_GB',
                    'value' => '28th',
                ],
                [
                    'reference' => 39,
                    'locale' => 'en_GB',
                    'value' => '29th',
                ],
                [
                    'reference' => 40,
                    'locale' => 'en_GB',
                    'value' => '30th',
                ],
                [
                    'reference' => 41,
                    'locale' => 'en_GB',
                    'value' => '31th',
                ],
                [
                    'reference' => 42,
                    'locale' => 'en_GB',
                    'value' => '32th',
                ],
                [
                    'reference' => 43,
                    'locale' => 'en_GB',
                    'value' => '33th',
                ],
                [
                    'reference' => 44,
                    'locale' => 'en_GB',
                    'value' => '34th',
                ],
                [
                    'reference' => 45,
                    'locale' => 'en_GB',
                    'value' => '35th',
                ],
                [
                    'reference' => 46,
                    'locale' => 'en_GB',
                    'value' => '36th',
                ],
                [
                    'reference' => 47,
                    'locale' => 'en_GB',
                    'value' => '37th',
                ],
                [
                    'reference' => 48,
                    'locale' => 'en_GB',
                    'value' => '38th',
                ],
                [
                    'reference' => 49,
                    'locale' => 'en_GB',
                    'value' => '39th',
                ],
                [
                    'reference' => 50,
                    'locale' => 'en_GB',
                    'value' => '40th',
                ],
                [
                    'reference' => 51,
                    'locale' => 'en_GB',
                    'value' => '-5',
                ],
                [
                    'reference' => 52,
                    'locale' => 'en_GB',
                    'value' => '-6',
                ],
                [
                    'reference' => 53,
                    'locale' => 'en_GB',
                    'value' => '-7',
                ],
                [
                    'reference' => 54,
                    'locale' => 'en_GB',
                    'value' => '-8',
                ],
                [
                    'reference' => 55,
                    'locale' => 'en_GB',
                    'value' => '-9',
                ],
                [
                    'reference' => 56,
                    'locale' => 'en_GB',
                    'value' => '-10',
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
        Schema::dropIfExists('apimo_property_floor');
    }
}
