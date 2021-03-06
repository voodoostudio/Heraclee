<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ApimoPropertyStanding extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apimo_property_standing', function (Blueprint $table) {
            $table->integer('reference');
            $table->string('locale');
            $table->string('value');
            $table->string('value_plurial')->nullable();
        });

        DB::table('apimo_property_standing')->insert(
            [
                [
                    'reference' => 1,
                    'locale' => 'fr_FR',
                    'value' => 'Standing',
                ],
                [
                    'reference' => 2,
                    'locale' => 'fr_FR',
                    'value' => 'Luxe',
                ],
                [
                    'reference' => 3,
                    'locale' => 'fr_FR',
                    'value' => 'Grand Luxe',
                ],
                [
                    'reference' => 4,
                    'locale' => 'fr_FR',
                    'value' => 'Grand ensemble',
                ],
                [
                    'reference' => 5,
                    'locale' => 'fr_FR',
                    'value' => 'Normal',
                ],
                [
                    'reference' => 1,
                    'locale' => 'en_GB',
                    'value' => 'High standard',
                ],
                [
                    'reference' => 2,
                    'locale' => 'en_GB',
                    'value' => 'Luxury',
                ],
                [
                    'reference' => 3,
                    'locale' => 'en_GB',
                    'value' => 'High luxury',
                ],
                [
                    'reference' => 4,
                    'locale' => 'en_GB',
                    'value' => 'Housing estate',
                ],
                [
                    'reference' => 5,
                    'locale' => 'en_GB',
                    'value' => 'Regular',
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
        Schema::dropIfExists('apimo_property_standing');
    }
}
