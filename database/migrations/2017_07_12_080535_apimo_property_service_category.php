<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ApimoPropertyServiceCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apimo_property_service_category', function (Blueprint $table) {
            $table->integer('reference');
            $table->string('locale');
            $table->string('value');
            $table->string('value_plurial')->nullable();
        });

        DB::table('apimo_property_service_category')->insert(
            [
                [
                    'reference' => 1,
                    'locale' => 'fr_FR',
                    'value' => 'Équipements',
                ],
                [
                    'reference' => 2,
                    'locale' => 'fr_FR',
                    'value' => 'Espaces extérieurs',
                ],
                [
                    'reference' => 3,
                    'locale' => 'fr_FR',
                    'value' => 'Excédent brut d\'exploitation',
                ],
                [
                    'reference' => 4,
                    'locale' => 'fr_FR',
                    'value' => 'Bâtiment',
                ],
                [
                    'reference' => 5,
                    'locale' => 'fr_FR',
                    'value' => 'Sécurité',
                ],
                [
                    'reference' => 6,
                    'locale' => 'fr_FR',
                    'value' => 'Équipements sportifs',
                ],
                [
                    'reference' => 7,
                    'locale' => 'fr_FR',
                    'value' => 'Équipements professionnels',
                ],
                [
                    'reference' => 1,
                    'locale' => 'en_GB',
                    'value' => 'Supplies',
                ],
                [
                    'reference' => 2,
                    'locale' => 'en_GB',
                    'value' => 'Outdoor spaces',
                ],
                [
                    'reference' => 3,
                    'locale' => 'en_GB',
                    'value' => 'Seasonal supplies',
                ],
                [
                    'reference' => 4,
                    'locale' => 'en_GB',
                    'value' => 'Building',
                ],
                [
                    'reference' => 5,
                    'locale' => 'en_GB',
                    'value' => 'Security',
                ],
                [
                    'reference' => 6,
                    'locale' => 'en_GB',
                    'value' => 'Sport supplies',
                ],
                [
                    'reference' => 7,
                    'locale' => 'en_GB',
                    'value' => 'Professional supplies',
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
        Schema::dropIfExists('apimo_property_service_category');
    }
}
