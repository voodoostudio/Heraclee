<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ApimoPropertySubcategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apimo_property_subcategory', function (Blueprint $table) {
            $table->integer('reference');
            $table->string('locale');
            $table->string('value');
            $table->string('value_plurial')->nullable();
        });

        DB::table('apimo_property_subcategory')->insert(
            [
                [
                    'reference' => 1,
                    'locale' => 'fr_FR',
                    'value' => 'Vente à l\'unité',
                ],
                [
                    'reference' => 2,
                    'locale' => 'fr_FR',
                    'value' => 'Vente en bloc',
                ],
                [
                    'reference' => 21,
                    'locale' => 'fr_FR',
                    'value' => 'Vide',
                ],
                [
                    'reference' => 22,
                    'locale' => 'fr_FR',
                    'value' => 'Meublée',
                ],
                [
                    'reference' => 23,
                    'locale' => 'fr_FR',
                    'value' => 'Colocation',
                ],
                [
                    'reference' => 24,
                    'locale' => 'fr_FR',
                    'value' => 'Étudiant',
                ],
                [
                    'reference' => 31,
                    'locale' => 'fr_FR',
                    'value' => 'Vacances',
                ],
                [
                    'reference' => 32,
                    'locale' => 'fr_FR',
                    'value' => 'Événementiel',
                ],
                [
                    'reference' => 51,
                    'locale' => 'fr_FR',
                    'value' => 'Viager libre',
                ],
                [
                    'reference' => 52,
                    'locale' => 'fr_FR',
                    'value' => 'Viager occupé',
                ],
                [
                    'reference' => 53,
                    'locale' => 'fr_FR',
                    'value' => 'Nue-propriété',
                ],
                [
                    'reference' => 54,
                    'locale' => 'fr_FR',
                    'value' => 'Vente à terme',
                ],
                [
                    'reference' => 55,
                    'locale' => 'fr_FR',
                    'value' => 'Viager semi-occupé',
                ],
                [
                    'reference' => 56,
                    'locale' => 'fr_FR',
                    'value' => 'Vente à terme libre',
                ],
                [
                    'reference' => 57,
                    'locale' => 'fr_FR',
                    'value' => 'Vente à terme semi-occupé',
                ],
                [
                    'reference' => 58,
                    'locale' => 'fr_FR',
                    'value' => 'Vente à terme occupé',
                ],
                [
                    'reference' => 59,
                    'locale' => 'fr_FR',
                    'value' => 'Viager sans rente',
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
        Schema::dropIfExists('apimo_property_subcategory');
    }
}
