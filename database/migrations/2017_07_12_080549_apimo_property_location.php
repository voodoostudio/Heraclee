<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ApimoPropertyLocation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apimo_property_location', function (Blueprint $table) {
            $table->integer('reference');
            $table->string('locale');
            $table->string('value');
            $table->string('value_plurial')->nullable();
        });

        DB::table('apimo_property_location')->insert(
            [
                [
                    'reference' => 1,
                    'locale' => 'fr_FR',
                    'value' => 'Bord de mer',
                ],
                [
                    'reference' => 2,
                    'locale' => 'fr_FR',
                    'value' => 'Village',
                ],
                [
                    'reference' => 3,
                    'locale' => 'fr_FR',
                    'value' => 'Vieille ville',
                ],
                [
                    'reference' => 4,
                    'locale' => 'fr_FR',
                    'value' => 'Zone piétonne',
                ],
                [
                    'reference' => 5,
                    'locale' => 'fr_FR',
                    'value' => 'Piste de ski',
                ],
                [
                    'reference' => 6,
                    'locale' => 'fr_FR',
                    'value' => 'Centre ville',
                ],
                [
                    'reference' => 7,
                    'locale' => 'fr_FR',
                    'value' => 'Zone industrielle',
                ],
                [
                    'reference' => 8,
                    'locale' => 'fr_FR',
                    'value' => 'Centre commercial',
                ],
                [
                    'reference' => 9,
                    'locale' => 'fr_FR',
                    'value' => 'Zone d\'activité',
                ],
                [
                    'reference' => 10,
                    'locale' => 'fr_FR',
                    'value' => 'Zone aéroportuaire',
                ],
                [
                    'reference' => 11,
                    'locale' => 'fr_FR',
                    'value' => 'Technopôle',
                ],
                [
                    'reference' => 12,
                    'locale' => 'fr_FR',
                    'value' => 'Zone portuaire',
                ],
                [
                    'reference' => 13,
                    'locale' => 'fr_FR',
                    'value' => 'Périphérie',
                ],
                [
                    'reference' => 14,
                    'locale' => 'fr_FR',
                    'value' => 'Hauteurs',
                ],
                [
                    'reference' => 15,
                    'locale' => 'fr_FR',
                    'value' => 'Pieds dans l\'eau',
                ],
                [
                    'reference' => 16,
                    'locale' => 'fr_FR',
                    'value' => 'Campagne',
                ],
                [
                    'reference' => 17,
                    'locale' => 'fr_FR',
                    'value' => 'Banlieue',
                ],
                [
                    'reference' => 1,
                    'locale' => 'en_GB',
                    'value' => 'Seaside',
                ],
                [
                    'reference' => 2,
                    'locale' => 'en_GB',
                    'value' => 'Village',
                ],
                [
                    'reference' => 3,
                    'locale' => 'en_GB',
                    'value' => 'Old town',
                ],
                [
                    'reference' => 4,
                    'locale' => 'en_GB',
                    'value' => 'Precinct',
                ],
                [
                    'reference' => 5,
                    'locale' => 'en_GB',
                    'value' => 'Ski slope',
                ],
                [
                    'reference' => 6,
                    'locale' => 'en_GB',
                    'value' => 'Town center',
                ],
                [
                    'reference' => 7,
                    'locale' => 'en_GB',
                    'value' => 'Industrial estate',
                ],
                [
                    'reference' => 8,
                    'locale' => 'en_GB',
                    'value' => 'Shopping center',
                ],
                [
                    'reference' => 9,
                    'locale' => 'en_GB',
                    'value' => 'Business park',
                ],
                [
                    'reference' => 10,
                    'locale' => 'en_GB',
                    'value' => 'Airport area',
                ],
                [
                    'reference' => 11,
                    'locale' => 'en_GB',
                    'value' => 'Science park',
                ],
                [
                    'reference' => 12,
                    'locale' => 'en_GB',
                    'value' => 'Port area',
                ],
                [
                    'reference' => 13,
                    'locale' => 'en_GB',
                    'value' => 'Outskirts',
                ],
                [
                    'reference' => 14,
                    'locale' => 'en_GB',
                    'value' => 'Hills',
                ],
                [
                    'reference' => 15,
                    'locale' => 'en_GB',
                    'value' => 'Waterfront',
                ],
                [
                    'reference' => 16,
                    'locale' => 'en_GB',
                    'value' => 'Countryside',
                ],
                [
                    'reference' => 17,
                    'locale' => 'en_GB',
                    'value' => 'Suburb',
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
        Schema::dropIfExists('apimo_property_location');
    }
}
