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
                [
                    'reference' => 1,
                    'locale' => 'en_GB',
                    'value' => 'Unit sale',
                ],
                [
                    'reference' => 2,
                    'locale' => 'en_GB',
                    'value' => 'Bulk sale',
                ],
                [
                    'reference' => 21,
                    'locale' => 'en_GB',
                    'value' => 'Unfurnished',
                ],
                [
                    'reference' => 22,
                    'locale' => 'en_GB',
                    'value' => 'Furnished',
                ],
                [
                    'reference' => 23,
                    'locale' => 'en_GB',
                    'value' => 'Roommate',
                ],
                [
                    'reference' => 24,
                    'locale' => 'en_GB',
                    'value' => 'Student',
                ],
                [
                    'reference' => 31,
                    'locale' => 'en_GB',
                    'value' => 'Holidays',
                ],
                [
                    'reference' => 32,
                    'locale' => 'en_GB',
                    'value' => 'Event',
                ],
                [
                    'reference' => 51,
                    'locale' => 'en_GB',
                    'value' => 'Life annuity',
                ],
                [
                    'reference' => 52,
                    'locale' => 'en_GB',
                    'value' => 'Life annuity occupied',
                ],
                [
                    'reference' => 53,
                    'locale' => 'en_GB',
                    'value' => 'Bare Ownership',
                ],
                [
                    'reference' => 54,
                    'locale' => 'en_GB',
                    'value' => 'Forward sale',
                ],
                [
                    'reference' => 55,
                    'locale' => 'en_GB',
                    'value' => 'Life annuity semi-occupied',
                ],
                [
                    'reference' => 56,
                    'locale' => 'en_GB',
                    'value' => 'Forward sale available',
                ],
                [
                    'reference' => 57,
                    'locale' => 'en_GB',
                    'value' => 'Forward sale semi-occupied',
                ],
                [
                    'reference' => 58,
                    'locale' => 'en_GB',
                    'value' => 'Forward sale occupied',
                ],
                [
                    'reference' => 59,
                    'locale' => 'en_GB',
                    'value' => 'Life annuity without income',
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
