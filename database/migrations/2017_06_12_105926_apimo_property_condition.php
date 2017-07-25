<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ApimoPropertyCondition extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apimo_property_condition', function (Blueprint $table) {
            $table->integer('reference');
            $table->string('locale');
            $table->string('value');
            $table->string('value_plurial')->nullable();
        });

        DB::table('apimo_property_condition')->insert(
            [
                [
                    'reference' => 1,
                    'locale' => 'fr_FR',
                    'value' => 'À rafraîchir',
                ],
                [
                    'reference' => 3,
                    'locale' => 'fr_FR',
                    'value' => 'Bon état',
                ],
                [
                    'reference' => 5,
                    'locale' => 'fr_FR',
                    'value' => 'À rénover',
                ],
                [
                    'reference' => 6,
                    'locale' => 'fr_FR',
                    'value' => 'Excellent état',
                ],
                [
                    'reference' => 8,
                    'locale' => 'fr_FR',
                    'value' => 'Neuf',
                ],
                [
                    'reference' => 1,
                    'locale' => 'en_GB',
                    'value' => 'Requires updating',
                ],
                [
                    'reference' => 3,
                    'locale' => 'en_GB',
                    'value' => 'Good condition',
                ],
                [
                    'reference' => 5,
                    'locale' => 'en_GB',
                    'value' => 'Requires renovation',
                ],
                [
                    'reference' => 6,
                    'locale' => 'en_GB',
                    'value' => 'Excellent condition',
                ],
                [
                    'reference' => 8,
                    'locale' => 'en_GB',
                    'value' => 'New',
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
        Schema::dropIfExists('apimo_property_condition');
    }
}
