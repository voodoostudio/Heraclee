<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ApimoPropertyCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apimo_property_category', function (Blueprint $table) {
            $table->integer('reference');
            $table->string('locale');
            $table->string('value');
            $table->string('value_plurial')->nullable();
        });

        DB::table('apimo_property_category')->insert(
            [
                [
                    'reference' => 1,
                    'locale' => 'fr_FR',
                    'value' => 'Vente',
                ],
                [
                    'reference' => 2,
                    'locale' => 'fr_FR',
                    'value' => 'Location',
                ],
                [
                    'reference' => 3,
                    'locale' => 'fr_FR',
                    'value' => 'Location saisonnière',
                ],
                [
                    'reference' => 4,
                    'locale' => 'fr_FR',
                    'value' => 'Programme neuf',
                ],
                [
                    'reference' => 5,
                    'locale' => 'fr_FR',
                    'value' => 'Viager / Nue-propriété',
                ],
                [
                    'reference' => 6,
                    'locale' => 'fr_FR',
                    'value' => 'Enchère',
                ],
                [
                    'reference' => 1,
                    'locale' => 'en_GB',
                    'value' => 'Sale',
                ],
                [
                    'reference' => 2,
                    'locale' => 'en_GB',
                    'value' => 'Rental',
                ],
                [
                    'reference' => 3,
                    'locale' => 'en_GB',
                    'value' => 'Seasonal rental',
                ],
                [
                    'reference' => 4,
                    'locale' => 'en_GB',
                    'value' => 'New construction',
                ],
                [
                    'reference' => 5,
                    'locale' => 'en_GB',
                    'value' => 'Life annuity',
                ],
                [
                    'reference' => 6,
                    'locale' => 'en_GB',
                    'value' => 'Auction',
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
        Schema::dropIfExists('apimo_property_category');
    }
}
