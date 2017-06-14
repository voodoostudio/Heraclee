<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ApimoPropertyActivity extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apimo_property_activity', function (Blueprint $table) {
            $table->integer('reference');
            $table->string('locale');
            $table->string('value');
            $table->string('value_plurial')->nullable();
        });

        DB::table('apimo_property_activity')->insert(
            [
                [
                    'reference' => 1,
                    'locale' => 'fr_FR',
                    'value' => 'Profession libérale',
                ],
                [
                    'reference' => 2,
                    'locale' => 'fr_FR',
                    'value' => 'Boulangerie',
                ],
                [
                    'reference' => 3,
                    'locale' => 'fr_FR',
                    'value' => 'Restaurant',
                ],
                [
                    'reference' => 4,
                    'locale' => 'fr_FR',
                    'value' => 'Presse',
                ],
                [
                    'reference' => 5,
                    'locale' => 'fr_FR',
                    'value' => 'Bar',
                ],
                [
                    'reference' => 6,
                    'locale' => 'fr_FR',
                    'value' => 'Fleuriste',
                ],
                [
                    'reference' => 7,
                    'locale' => 'fr_FR',
                    'value' => 'Tabac',
                ],
                [
                    'reference' => 8,
                    'locale' => 'fr_FR',
                    'value' => 'Prêt-à-porter',
                ],
                [
                    'reference' => 9,
                    'locale' => 'fr_FR',
                    'value' => 'Pharmacie',
                ],
                [
                    'reference' => 10,
                    'locale' => 'fr_FR',
                    'value' => 'Centre commercial',
                ],
                [
                    'reference' => 11,
                    'locale' => 'fr_FR',
                    'value' => 'Agence de voyage',
                ],
                [
                    'reference' => 12,
                    'locale' => 'fr_FR',
                    'value' => 'Agence immobilière',
                ],
                [
                    'reference' => 13,
                    'locale' => 'fr_FR',
                    'value' => 'Galerie',
                ],
                [
                    'reference' => 14,
                    'locale' => 'fr_FR',
                    'value' => 'Garage',
                ],
                [
                    'reference' => 15,
                    'locale' => 'fr_FR',
                    'value' => 'Assureur',
                ],
                [
                    'reference' => 16,
                    'locale' => 'fr_FR',
                    'value' => 'Opticien',
                ],
                [
                    'reference' => 17,
                    'locale' => 'fr_FR',
                    'value' => 'Parfumerie',
                ],
                [
                    'reference' => 18,
                    'locale' => 'fr_FR',
                    'value' => 'Hôtel',
                ],
                [
                    'reference' => 19,
                    'locale' => 'fr_FR',
                    'value' => 'Antiquaire',
                ],
                [
                    'reference' => 20,
                    'locale' => 'fr_FR',
                    'value' => 'Laverie',
                ],
                [
                    'reference' => 21,
                    'locale' => 'fr_FR',
                    'value' => 'Pressing',
                ],
                [
                    'reference' => 22,
                    'locale' => 'fr_FR',
                    'value' => 'Bijouterie',
                ],
                [
                    'reference' => 23,
                    'locale' => 'fr_FR',
                    'value' => 'Alimentation',
                ],
                [
                    'reference' => 24,
                    'locale' => 'fr_FR',
                    'value' => 'Boucherie',
                ],
                [
                    'reference' => 25,
                    'locale' => 'fr_FR',
                    'value' => 'Traiteur',
                ],
                [
                    'reference' => 26,
                    'locale' => 'fr_FR',
                    'value' => 'Brasserie',
                ],
                [
                    'reference' => 27,
                    'locale' => 'fr_FR',
                    'value' => 'Snack',
                ],
                [
                    'reference' => 28,
                    'locale' => 'fr_FR',
                    'value' => 'Pâtisserie',
                ],
                [
                    'reference' => 29,
                    'locale' => 'fr_FR',
                    'value' => 'Charcutier',
                ],
                [
                    'reference' => 30,
                    'locale' => 'fr_FR',
                    'value' => 'Épicerie',
                ],
                [
                    'reference' => 31,
                    'locale' => 'fr_FR',
                    'value' => 'Fromager',
                ],
                [
                    'reference' => 32,
                    'locale' => 'fr_FR',
                    'value' => 'Primeur',
                ],
                [
                    'reference' => 33,
                    'locale' => 'fr_FR',
                    'value' => 'Sex shop',
                ],
                [
                    'reference' => 34,
                    'locale' => 'fr_FR',
                    'value' => 'Jeux vidéo',
                ],
                [
                    'reference' => 35,
                    'locale' => 'fr_FR',
                    'value' => 'Informatique',
                ],
                [
                    'reference' => 36,
                    'locale' => 'fr_FR',
                    'value' => 'Coiffeur',
                ],
                [
                    'reference' => 37,
                    'locale' => 'fr_FR',
                    'value' => 'Esthéticien',
                ],
                [
                    'reference' => 38,
                    'locale' => 'fr_FR',
                    'value' => 'Électroménager',
                ],
                [
                    'reference' => 39,
                    'locale' => 'fr_FR',
                    'value' => 'Chaussures',
                ],
                [
                    'reference' => 40,
                    'locale' => 'fr_FR',
                    'value' => 'Mercerie',
                ],
                [
                    'reference' => 41,
                    'locale' => 'fr_FR',
                    'value' => 'Toiletteur',
                ],
                [
                    'reference' => 42,
                    'locale' => 'fr_FR',
                    'value' => 'Salon de thé',
                ],
                [
                    'reference' => 43,
                    'locale' => 'fr_FR',
                    'value' => 'Plage',
                ],
                [
                    'reference' => 44,
                    'locale' => 'fr_FR',
                    'value' => 'Librairie',
                ],
                [
                    'reference' => 45,
                    'locale' => 'fr_FR',
                    'value' => 'Bureaux',
                ],
                [
                    'reference' => 46,
                    'locale' => 'fr_FR',
                    'value' => 'Station-service',
                ],
                [
                    'reference' => 47,
                    'locale' => 'fr_FR',
                    'value' => 'Camping',
                ],
                [
                    'reference' => 48,
                    'locale' => 'fr_FR',
                    'value' => 'Club - Discothèque',
                ],
                [
                    'reference' => 49,
                    'locale' => 'fr_FR',
                    'value' => 'Animalerie',
                ],
                [
                    'reference' => 50,
                    'locale' => 'fr_FR',
                    'value' => 'Salle de jeux',
                ],
                [
                    'reference' => 51,
                    'locale' => 'fr_FR',
                    'value' => 'Papeterie',
                ],
                [
                    'reference' => 52,
                    'locale' => 'fr_FR',
                    'value' => 'Mobilier',
                ],
                [
                    'reference' => 53,
                    'locale' => 'fr_FR',
                    'value' => 'Décoration',
                ],
                [
                    'reference' => 54,
                    'locale' => 'fr_FR',
                    'value' => 'Agriculture',
                ],
                [
                    'reference' => 55,
                    'locale' => 'fr_FR',
                    'value' => 'Photo',
                ],
                [
                    'reference' => 56,
                    'locale' => 'fr_FR',
                    'value' => 'Parapharmacie',
                ],
                [
                    'reference' => 57,
                    'locale' => 'fr_FR',
                    'value' => 'Serrurerie',
                ],
                [
                    'reference' => 58,
                    'locale' => 'fr_FR',
                    'value' => 'Centre de fitness',
                ],
                [
                    'reference' => 59,
                    'locale' => 'fr_FR',
                    'value' => 'Taxi',
                ],
                [
                    'reference' => 60,
                    'locale' => 'fr_FR',
                    'value' => 'Cinéma',
                ],
                [
                    'reference' => 61,
                    'locale' => 'fr_FR',
                    'value' => 'Théâtre',
                ],
                [
                    'reference' => 62,
                    'locale' => 'fr_FR',
                    'value' => 'Café',
                ],
                [
                    'reference' => 63,
                    'locale' => 'fr_FR',
                    'value' => 'Jardinerie',
                ],
                [
                    'reference' => 64,
                    'locale' => 'fr_FR',
                    'value' => 'Bricolage',
                ],
                [
                    'reference' => 65,
                    'locale' => 'fr_FR',
                    'value' => 'Poissonnerie',
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
        Schema::dropIfExists('apimo_property_activity');
    }
}
