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
                [
                    'reference' => 1,
                    'locale' => 'en_GB',
                    'value' => 'Self-employed',
                ],
                [
                    'reference' => 2,
                    'locale' => 'en_GB',
                    'value' => 'Bakery',
                ],
                [
                    'reference' => 3,
                    'locale' => 'en_GB',
                    'value' => 'Restaurant',
                ],
                [
                    'reference' => 4,
                    'locale' => 'en_GB',
                    'value' => 'Press',
                ],
                [
                    'reference' => 5,
                    'locale' => 'en_GB',
                    'value' => 'Bar',
                ],
                [
                    'reference' => 6,
                    'locale' => 'en_GB',
                    'value' => 'Florist',
                ],
                [
                    'reference' => 7,
                    'locale' => 'en_GB',
                    'value' => 'Tobacconist',
                ],
                [
                    'reference' => 8,
                    'locale' => 'en_GB',
                    'value' => 'Clothes',
                ],
                [
                    'reference' => 9,
                    'locale' => 'en_GB',
                    'value' => 'Chemist',
                ],
                [
                    'reference' => 10,
                    'locale' => 'en_GB',
                    'value' => 'Shopping centre',
                ],
                [
                    'reference' => 11,
                    'locale' => 'en_GB',
                    'value' => 'Travel agency',
                ],
                [
                    'reference' => 12,
                    'locale' => 'en_GB',
                    'value' => 'Real estate agent',
                ],
                [
                    'reference' => 13,
                    'locale' => 'en_GB',
                    'value' => 'Gallery',
                ],
                [
                    'reference' => 14,
                    'locale' => 'en_GB',
                    'value' => 'Garage',
                ],
                [
                    'reference' => 15,
                    'locale' => 'en_GB',
                    'value' => 'Insurer',
                ],
                [
                    'reference' => 16,
                    'locale' => 'en_GB',
                    'value' => 'Optician',
                ],
                [
                    'reference' => 17,
                    'locale' => 'en_GB',
                    'value' => 'Perfumery',
                ],
                [
                    'reference' => 18,
                    'locale' => 'en_GB',
                    'value' => 'Hotel',
                ],
                [
                    'reference' => 19,
                    'locale' => 'en_GB',
                    'value' => 'Antique dealer',
                ],
                [
                    'reference' => 20,
                    'locale' => 'en_GB',
                    'value' => 'Laundry',
                ],
                [
                    'reference' => 21,
                    'locale' => 'en_GB',
                    'value' => 'Pressing',
                ],
                [
                    'reference' => 22,
                    'locale' => 'en_GB',
                    'value' => 'Jeweller',
                ],
                [
                    'reference' => 23,
                    'locale' => 'en_GB',
                    'value' => 'Grocer',
                ],
                [
                    'reference' => 24,
                    'locale' => 'en_GB',
                    'value' => 'Butcher',
                ],
                [
                    'reference' => 25,
                    'locale' => 'en_GB',
                    'value' => 'Caterer',
                ],
                [
                    'reference' => 26,
                    'locale' => 'en_GB',
                    'value' => 'Brewery',
                ],
                [
                    'reference' => 27,
                    'locale' => 'en_GB',
                    'value' => 'Snack',
                ],
                [
                    'reference' => 28,
                    'locale' => 'en_GB',
                    'value' => 'Confectioner',
                ],
                [
                    'reference' => 29,
                    'locale' => 'en_GB',
                    'value' => 'Pork butcher',
                ],
                [
                    'reference' => 30,
                    'locale' => 'en_GB',
                    'value' => 'Grocery',
                ],
                [
                    'reference' => 31,
                    'locale' => 'en_GB',
                    'value' => 'Cheesemonger',
                ],
                [
                    'reference' => 32,
                    'locale' => 'en_GB',
                    'value' => 'Fruit and vegetables',
                ],
                [
                    'reference' => 33,
                    'locale' => 'en_GB',
                    'value' => 'Sex shop',
                ],
                [
                    'reference' => 34,
                    'locale' => 'en_GB',
                    'value' => 'Video game',
                ],
                [
                    'reference' => 35,
                    'locale' => 'en_GB',
                    'value' => 'Computer',
                ],
                [
                    'reference' => 36,
                    'locale' => 'en_GB',
                    'value' => 'Hairdresser',
                ],
                [
                    'reference' => 37,
                    'locale' => 'en_GB',
                    'value' => 'Cosmetician',
                ],
                [
                    'reference' => 38,
                    'locale' => 'en_GB',
                    'value' => 'Household electrical',
                ],
                [
                    'reference' => 39,
                    'locale' => 'en_GB',
                    'value' => 'Shoes',
                ],
                [
                    'reference' => 40,
                    'locale' => 'en_GB',
                    'value' => 'Haberdasher',
                ],
                [
                    'reference' => 41,
                    'locale' => 'en_GB',
                    'value' => 'Groomer',
                ],
                [
                    'reference' => 42,
                    'locale' => 'en_GB',
                    'value' => 'Tea room',
                ],
                [
                    'reference' => 43,
                    'locale' => 'en_GB',
                    'value' => 'Beach',
                ],
                [
                    'reference' => 44,
                    'locale' => 'en_GB',
                    'value' => 'Bookshop',
                ],
                [
                    'reference' => 45,
                    'locale' => 'en_GB',
                    'value' => 'Offices',
                ],
                [
                    'reference' => 46,
                    'locale' => 'en_GB',
                    'value' => 'Gas station',
                ],
                [
                    'reference' => 47,
                    'locale' => 'en_GB',
                    'value' => 'Camping',
                ],
                [
                    'reference' => 48,
                    'locale' => 'en_GB',
                    'value' => 'Nightclub',
                ],
                [
                    'reference' => 49,
                    'locale' => 'en_GB',
                    'value' => 'Pet store',
                ],
                [
                    'reference' => 50,
                    'locale' => 'en_GB',
                    'value' => 'Video arcade',
                ],
                [
                    'reference' => 51,
                    'locale' => 'en_GB',
                    'value' => 'Office supplies',
                ],
                [
                    'reference' => 52,
                    'locale' => 'en_GB',
                    'value' => 'Furniture',
                ],
                [
                    'reference' => 53,
                    'locale' => 'en_GB',
                    'value' => 'Decoration',
                ],
                [
                    'reference' => 54,
                    'locale' => 'en_GB',
                    'value' => 'Agriculture',
                ],
                [
                    'reference' => 55,
                    'locale' => 'en_GB',
                    'value' => 'Photo',
                ],
                [
                    'reference' => 56,
                    'locale' => 'en_GB',
                    'value' => 'Drugstore',
                ],
                [
                    'reference' => 57,
                    'locale' => 'en_GB',
                    'value' => 'Locksmith',
                ],
                [
                    'reference' => 58,
                    'locale' => 'en_GB',
                    'value' => 'Health club',
                ],
                [
                    'reference' => 59,
                    'locale' => 'en_GB',
                    'value' => 'Taxi',
                ],
                [
                    'reference' => 60,
                    'locale' => 'en_GB',
                    'value' => 'Cinema',
                ],
                [
                    'reference' => 61,
                    'locale' => 'en_GB',
                    'value' => 'Theater',
                ],
                [
                    'reference' => 62,
                    'locale' => 'en_GB',
                    'value' => 'Café',
                ],
                [
                    'reference' => 63,
                    'locale' => 'en_GB',
                    'value' => 'Garden centre',
                ],
                [
                    'reference' => 64,
                    'locale' => 'en_GB',
                    'value' => 'Hardware shop',
                ],
                [
                    'reference' => 65,
                    'locale' => 'en_GB',
                    'value' => 'Fishmongers',
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
