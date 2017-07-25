<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ApimoPropertyType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apimo_property_type', function (Blueprint $table) {
            $table->integer('reference');
            $table->string('locale');
            $table->string('value');
            $table->string('value_plurial')->nullable();
        });

        DB::table('apimo_property_type')->insert(
            [
                [
                    'reference' => 1,
                    'locale' => 'fr_FR',
                    'value' => 'Appartement',
                ],
                [
                    'reference' => 2,
                    'locale' => 'fr_FR',
                    'value' => 'Maison',
                ],
                [
                    'reference' => 3,
                    'locale' => 'fr_FR',
                    'value' => 'Terrain',
                ],
                [
                    'reference' => 4,
                    'locale' => 'fr_FR',
                    'value' => 'Commerce',
                ],
                [
                    'reference' => 5,
                    'locale' => 'fr_FR',
                    'value' => 'Garage / Parking',
                ],
                [
                    'reference' => 6,
                    'locale' => 'fr_FR',
                    'value' => 'Immeuble',
                ],
                [
                    'reference' => 7,
                    'locale' => 'fr_FR',
                    'value' => 'Bureau',
                ],
                [
                    'reference' => 8,
                    'locale' => 'fr_FR',
                    'value' => 'Bateau',
                ],
                [
                    'reference' => 9,
                    'locale' => 'fr_FR',
                    'value' => 'Locaux d\'activité / Entrepôts',
                ],
                [
                    'reference' => 10,
                    'locale' => 'fr_FR',
                    'value' => 'Cave / Box',
                ],
                [
                    'reference' => 1,
                    'locale' => 'en_GB',
                    'value' => 'Apartment',
                ],
                [
                    'reference' => 2,
                    'locale' => 'en_GB',
                    'value' => 'House',
                ],
                [
                    'reference' => 3,
                    'locale' => 'en_GB',
                    'value' => 'Plot of land',
                ],
                [
                    'reference' => 4,
                    'locale' => 'en_GB',
                    'value' => 'Business',
                ],
                [
                    'reference' => 5,
                    'locale' => 'en_GB',
                    'value' => 'Garage/Parking',
                ],
                [
                    'reference' => 6,
                    'locale' => 'en_GB',
                    'value' => 'Building',
                ],
                [
                    'reference' => 7,
                    'locale' => 'en_GB',
                    'value' => 'Office',
                ],
                [
                    'reference' => 8,
                    'locale' => 'en_GB',
                    'value' => 'Boat',
                ],
                [
                    'reference' => 9,
                    'locale' => 'en_GB',
                    'value' => 'Warehouse',
                ],
                [
                    'reference' => 10,
                    'locale' => 'en_GB',
                    'value' => 'Cellar / Box',
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
        Schema::dropIfExists('apimo_property_type');
    }
}
