<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ApimoPropertyAgreement extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apimo_property_agreement', function (Blueprint $table) {
            $table->integer('reference');
            $table->string('locale');
            $table->string('value');
            $table->string('value_plurial')->nullable();
        });

        DB::table('apimo_property_agreement')->insert(
            [
                [
                    'reference' => 1,
                    'locale' => 'fr_FR',
                    'value' => 'Simple',
                ],
                [
                    'reference' => 2,
                    'locale' => 'fr_FR',
                    'value' => 'Co-exclusif',
                ],
                [
                    'reference' => 3,
                    'locale' => 'fr_FR',
                    'value' => 'Exclusif',
                ],
                [
                    'reference' => 4,
                    'locale' => 'fr_FR',
                    'value' => 'Délégation',
                ],
                [
                    'reference' => 5,
                    'locale' => 'fr_FR',
                    'value' => 'Exclusif agence',
                ],
                [
                    'reference' => 1,
                    'locale' => 'en_GB',
                    'value' => 'Standard',
                ],
                [
                    'reference' => 2,
                    'locale' => 'en_GB',
                    'value' => 'Co-exclusive',
                ],
                [
                    'reference' => 3,
                    'locale' => 'en_GB',
                    'value' => 'Exclusivity',
                ],
                [
                    'reference' => 4,
                    'locale' => 'en_GB',
                    'value' => 'Delegation',
                ],
                [
                    'reference' => 5,
                    'locale' => 'en_GB',
                    'value' => 'Exclusive agent',
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
        Schema::dropIfExists('apimo_property_agreement');
    }
}
