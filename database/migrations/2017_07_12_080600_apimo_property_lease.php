<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ApimoPropertyLease extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apimo_property_lease', function (Blueprint $table) {
            $table->integer('reference');
            $table->string('locale');
            $table->string('value');
            $table->string('value_plurial')->nullable();
        });

        DB::table('apimo_property_lease')->insert(
            [
                [
                    'reference' => 1,
                    'locale' => 'fr_FR',
                    'value' => 'Précaire',
                ],
                [
                    'reference' => 2,
                    'locale' => 'fr_FR',
                    'value' => 'Long terme',
                ],
                [
                    'reference' => 3,
                    'locale' => 'fr_FR',
                    'value' => 'Long terme simple commerce',
                ],
                [
                    'reference' => 4,
                    'locale' => 'fr_FR',
                    'value' => 'Long terme tout commerce',
                ],
                [
                    'reference' => 1,
                    'locale' => 'en_GB',
                    'value' => 'Term lease',
                ],
                [
                    'reference' => 2,
                    'locale' => 'en_GB',
                    'value' => 'Long-Term',
                ],
                [
                    'reference' => 3,
                    'locale' => 'en_GB',
                    'value' => 'Long-Term - Single activity',
                ],
                [
                    'reference' => 4,
                    'locale' => 'en_GB',
                    'value' => 'Long-Term - All activities',
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
        Schema::dropIfExists('apimo_property_lease');
    }
}
