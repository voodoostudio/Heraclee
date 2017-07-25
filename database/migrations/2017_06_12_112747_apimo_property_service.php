<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ApimoPropertyService extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apimo_property_service', function (Blueprint $table) {
            $table->integer('reference');
            $table->string('locale');
            $table->string('value');
            $table->string('value_plurial')->nullable();
        });

        DB::table('apimo_property_service')->insert(
            [
                [
                    'reference' => 1,
                    'locale' => 'fr_FR',
                    'value' => 'Internet',
                ],
                [
                    'reference' => 2,
                    'locale' => 'fr_FR',
                    'value' => 'Cheminée',
                ],
                [
                    'reference' => 3,
                    'locale' => 'fr_FR',
                    'value' => 'Accès handicapé',
                ],
                [
                    'reference' => 4,
                    'locale' => 'fr_FR',
                    'value' => 'Air conditionné',
                ],
                [
                    'reference' => 5,
                    'locale' => 'fr_FR',
                    'value' => 'Alarme',
                ],
                [
                    'reference' => 6,
                    'locale' => 'fr_FR',
                    'value' => 'Ascenseur',
                ],
                [
                    'reference' => 7,
                    'locale' => 'fr_FR',
                    'value' => 'AlarmGardiene',
                ],
                [
                    'reference' => 8,
                    'locale' => 'fr_FR',
                    'value' => 'Double vitrage',
                ],
                [
                    'reference' => 9,
                    'locale' => 'fr_FR',
                    'value' => 'Interphone',
                ],
                [
                    'reference' => 10,
                    'locale' => 'fr_FR',
                    'value' => 'Parabole',
                ],
                [
                    'reference' => 11,
                    'locale' => 'fr_FR',
                    'value' => 'Piscine',
                ],
                [
                    'reference' => 12,
                    'locale' => 'fr_FR',
                    'value' => 'Porte blindée',
                ],
                [
                    'reference' => 13,
                    'locale' => 'fr_FR',
                    'value' => 'Tennis',
                ],
                [
                    'reference' => 14,
                    'locale' => 'fr_FR',
                    'value' => 'Arrosage',
                ],
                [
                    'reference' => 15,
                    'locale' => 'fr_FR',
                    'value' => 'Barbecue',
                ],
                [
                    'reference' => 16,
                    'locale' => 'fr_FR',
                    'value' => 'Portail électrique',
                ],
                [
                    'reference' => 17,
                    'locale' => 'fr_FR',
                    'value' => 'Vide sanitaire',
                ],
                [
                    'reference' => 18,
                    'locale' => 'fr_FR',
                    'value' => 'Abri de voiture',
                ],
                [
                    'reference' => 19,
                    'locale' => 'fr_FR',
                    'value' => 'Maison de gardien',
                ],
                [
                    'reference' => 20,
                    'locale' => 'fr_FR',
                    'value' => 'Baies vitrées',
                ],
                [
                    'reference' => 21,
                    'locale' => 'fr_FR',
                    'value' => 'Aspiration centralisée',
                ],
                [
                    'reference' => 22,
                    'locale' => 'fr_FR',
                    'value' => 'Volets roulants électriques',
                ],
                [
                    'reference' => 23,
                    'locale' => 'fr_FR',
                    'value' => 'Stores',
                ],
                [
                    'reference' => 24,
                    'locale' => 'fr_FR',
                    'value' => 'Stores électriques',
                ],
                [
                    'reference' => 25,
                    'locale' => 'fr_FR',
                    'value' => 'Lave-linge',
                ],
                [
                    'reference' => 26,
                    'locale' => 'fr_FR',
                    'value' => 'Jacuzzi',
                ],
                [
                    'reference' => 27,
                    'locale' => 'fr_FR',
                    'value' => 'Sauna',
                ],
                [
                    'reference' => 28,
                    'locale' => 'fr_FR',
                    'value' => 'Baignoire balnéo',
                ],
                [
                    'reference' => 29,
                    'locale' => 'fr_FR',
                    'value' => 'Puits',
                ],
                [
                    'reference' => 30,
                    'locale' => 'fr_FR',
                    'value' => 'Source',
                ],
                [
                    'reference' => 31,
                    'locale' => 'fr_FR',
                    'value' => 'Groupe électrogène',
                ],
                [
                    'reference' => 32,
                    'locale' => 'fr_FR',
                    'value' => 'Lave-vaisselle',
                ],
                [
                    'reference' => 33,
                    'locale' => 'fr_FR',
                    'value' => 'Plaque de cuisson',
                ],
                [
                    'reference' => 34,
                    'locale' => 'fr_FR',
                    'value' => 'Coffre-fort',
                ],
                [
                    'reference' => 35,
                    'locale' => 'fr_FR',
                    'value' => 'Héliport',
                ],
                [
                    'reference' => 36,
                    'locale' => 'fr_FR',
                    'value' => 'Vidéophone',
                ],
                [
                    'reference' => 37,
                    'locale' => 'fr_FR',
                    'value' => 'Vidéo surveillance',
                ],
                [
                    'reference' => 38,
                    'locale' => 'fr_FR',
                    'value' => 'Cuisinière',
                ],
                [
                    'reference' => 39,
                    'locale' => 'fr_FR',
                    'value' => 'Fer à repasser',
                ],
                [
                    'reference' => 40,
                    'locale' => 'fr_FR',
                    'value' => 'Sèche-cheveux',
                ],
                [
                    'reference' => 41,
                    'locale' => 'fr_FR',
                    'value' => 'TV Satellite',
                ],
                [
                    'reference' => 42,
                    'locale' => 'fr_FR',
                    'value' => 'Lecteur DVD',
                ],
                [
                    'reference' => 43,
                    'locale' => 'fr_FR',
                    'value' => 'Lecteur CD',
                ],
                [
                    'reference' => 44,
                    'locale' => 'fr_FR',
                    'value' => 'Éclairage extérieur',
                ],
                [
                    'reference' => 45,
                    'locale' => 'fr_FR',
                    'value' => 'Spa',
                ],
                [
                    'reference' => 46,
                    'locale' => 'fr_FR',
                    'value' => 'Domotique',
                ],
                [
                    'reference' => 47,
                    'locale' => 'fr_FR',
                    'value' => 'Meublé',
                ],
                [
                    'reference' => 48,
                    'locale' => 'fr_FR',
                    'value' => 'Linge de maison',
                ],
                [
                    'reference' => 49,
                    'locale' => 'fr_FR',
                    'value' => 'Vaisselle',
                ],
                [
                    'reference' => 50,
                    'locale' => 'fr_FR',
                    'value' => 'Sèche-linge',
                ],
                [
                    'reference' => 51,
                    'locale' => 'fr_FR',
                    'value' => 'Téléphone',
                ],
                [
                    'reference' => 52,
                    'locale' => 'fr_FR',
                    'value' => 'Réfrigérateur',
                ],
                [
                    'reference' => 53,
                    'locale' => 'fr_FR',
                    'value' => 'Four',
                ],
                [
                    'reference' => 54,
                    'locale' => 'fr_FR',
                    'value' => 'Reception 24/7',
                ],
                [
                    'reference' => 55,
                    'locale' => 'fr_FR',
                    'value' => 'Cafetière',
                ],
                [
                    'reference' => 56,
                    'locale' => 'fr_FR',
                    'value' => 'Four à micro-ondes',
                ],
                [
                    'reference' => 57,
                    'locale' => 'fr_FR',
                    'value' => 'Ascenseur chabbatique',
                ],
                [
                    'reference' => 58,
                    'locale' => 'fr_FR',
                    'value' => 'Soukka',
                ],
                [
                    'reference' => 59,
                    'locale' => 'fr_FR',
                    'value' => 'Synagogue',
                ],
                [
                    'reference' => 60,
                    'locale' => 'fr_FR',
                    'value' => 'Digicode',
                ],
                [
                    'reference' => 61,
                    'locale' => 'fr_FR',
                    'value' => 'Buanderie commune',
                ],
                [
                    'reference' => 62,
                    'locale' => 'fr_FR',
                    'value' => 'Animaux autorisés',
                ],
                [
                    'reference' => 63,
                    'locale' => 'fr_FR',
                    'value' => 'Rideau métallique',
                ],
                [
                    'reference' => 64,
                    'locale' => 'fr_FR',
                    'value' => 'Baie de brassage',
                ],
                [
                    'reference' => 65,
                    'locale' => 'fr_FR',
                    'value' => 'Réseau informatique',
                ],
                [
                    'reference' => 66,
                    'locale' => 'fr_FR',
                    'value' => 'Faux plafond',
                ],
                [
                    'reference' => 67,
                    'locale' => 'fr_FR',
                    'value' => 'Robinet d\'incendie armé',
                ],
                [
                    'reference' => 68,
                    'locale' => 'fr_FR',
                    'value' => 'Extincteur automatique à eau',
                ],
                [
                    'reference' => 69,
                    'locale' => 'fr_FR',
                    'value' => 'Quai',
                ],
                [
                    'reference' => 70,
                    'locale' => 'fr_FR',
                    'value' => 'Thermostat connecté',
                ],
                [
                    'reference' => 71,
                    'locale' => 'fr_FR',
                    'value' => 'Jeu de boules',
                ],
                [
                    'reference' => 72,
                    'locale' => 'fr_FR',
                    'value' => 'Adoucisseur d\'eau',
                ],
                [
                    'reference' => 73,
                    'locale' => 'fr_FR',
                    'value' => 'Triple vitrage',
                ],
                [
                    'reference' => 74,
                    'locale' => 'fr_FR',
                    'value' => 'Forage',
                ],
                [
                    'reference' => 75,
                    'locale' => 'fr_FR',
                    'value' => 'Fibre optique',
                ],
                [
                    'reference' => 1,
                    'locale' => 'en_GB',
                    'value' => 'Internet',
                ],
                [
                    'reference' => 2,
                    'locale' => 'en_GB',
                    'value' => 'Fireplace',
                ],
                [
                    'reference' => 3,
                    'locale' => 'en_GB',
                    'value' => 'Disabled access',
                ],
                [
                    'reference' => 4,
                    'locale' => 'en_GB',
                    'value' => 'Air-conditioning',
                ],
                [
                    'reference' => 5,
                    'locale' => 'en_GB',
                    'value' => 'Alarm',
                ],
                [
                    'reference' => 6,
                    'locale' => 'en_GB',
                    'value' => 'Lift',
                ],
                [
                    'reference' => 7,
                    'locale' => 'en_GB',
                    'value' => 'Caretaker',
                ],
                [
                    'reference' => 8,
                    'locale' => 'en_GB',
                    'value' => 'Double glazing',
                ],
                [
                    'reference' => 9,
                    'locale' => 'en_GB',
                    'value' => 'Intercom',
                ],
                [
                    'reference' => 10,
                    'locale' => 'en_GB',
                    'value' => 'Parabolic antenna',
                ],
                [
                    'reference' => 11,
                    'locale' => 'en_GB',
                    'value' => 'Swimming pool',
                ],
                [
                    'reference' => 12,
                    'locale' => 'en_GB',
                    'value' => 'Security door',
                ],
                [
                    'reference' => 13,
                    'locale' => 'en_GB',
                    'value' => 'Tennis',
                ],
                [
                    'reference' => 14,
                    'locale' => 'en_GB',
                    'value' => 'Sprinkler system',
                ],
                [
                    'reference' => 15,
                    'locale' => 'en_GB',
                    'value' => 'Barbecue',
                ],
                [
                    'reference' => 16,
                    'locale' => 'en_GB',
                    'value' => 'Electric gate',
                ],
                [
                    'reference' => 17,
                    'locale' => 'en_GB',
                    'value' => 'Crawl space',
                ],
                [
                    'reference' => 18,
                    'locale' => 'en_GB',
                    'value' => 'Car port',
                ],
                [
                    'reference' => 19,
                    'locale' => 'en_GB',
                    'value' => 'Caretaker house',
                ],
                [
                    'reference' => 20,
                    'locale' => 'en_GB',
                    'value' => 'Bay-window',
                ],
                [
                    'reference' => 21,
                    'locale' => 'en_GB',
                    'value' => 'Central vaccum system',
                ],
                [
                    'reference' => 22,
                    'locale' => 'en_GB',
                    'value' => 'Electric shutters',
                ],
                [
                    'reference' => 23,
                    'locale' => 'en_GB',
                    'value' => 'Window shade',
                ],
                [
                    'reference' => 24,
                    'locale' => 'en_GB',
                    'value' => 'Electric window shade',
                ],
                [
                    'reference' => 25,
                    'locale' => 'en_GB',
                    'value' => 'Washing machine',
                ],
                [
                    'reference' => 26,
                    'locale' => 'en_GB',
                    'value' => 'Jacuzzi',
                ],
                [
                    'reference' => 27,
                    'locale' => 'en_GB',
                    'value' => 'Sauna',
                ],
                [
                    'reference' => 28,
                    'locale' => 'en_GB',
                    'value' => 'Whirlpool tub',
                ],
                [
                    'reference' => 29,
                    'locale' => 'en_GB',
                    'value' => 'Well',
                ],
                [
                    'reference' => 30,
                    'locale' => 'en_GB',
                    'value' => 'Spring',
                ],
                [
                    'reference' => 31,
                    'locale' => 'en_GB',
                    'value' => 'Engine generator',
                ],
                [
                    'reference' => 32,
                    'locale' => 'en_GB',
                    'value' => 'Dishwasher',
                ],
                [
                    'reference' => 33,
                    'locale' => 'en_GB',
                    'value' => 'Hob',
                ],
                [
                    'reference' => 34,
                    'locale' => 'en_GB',
                    'value' => 'Safe',
                ],
                [
                    'reference' => 35,
                    'locale' => 'en_GB',
                    'value' => 'Helipad',
                ],
                [
                    'reference' => 36,
                    'locale' => 'en_GB',
                    'value' => 'Videophone',
                ],
                [
                    'reference' => 37,
                    'locale' => 'en_GB',
                    'value' => 'Video security',
                ],
                [
                    'reference' => 38,
                    'locale' => 'en_GB',
                    'value' => 'Stove',
                ],
                [
                    'reference' => 39,
                    'locale' => 'en_GB',
                    'value' => 'Iron',
                ],
                [
                    'reference' => 40,
                    'locale' => 'en_GB',
                    'value' => 'Hair dryer',
                ],
                [
                    'reference' => 41,
                    'locale' => 'en_GB',
                    'value' => 'Satellite TV',
                ],
                [
                    'reference' => 42,
                    'locale' => 'en_GB',
                    'value' => 'DVD Player',
                ],
                [
                    'reference' => 43,
                    'locale' => 'en_GB',
                    'value' => 'CD Player',
                ],
                [
                    'reference' => 44,
                    'locale' => 'en_GB',
                    'value' => 'Outdoor lighting',
                ],
                [
                    'reference' => 45,
                    'locale' => 'en_GB',
                    'value' => 'Spa',
                ],
                [
                    'reference' => 46,
                    'locale' => 'en_GB',
                    'value' => 'Home automation',
                ],
                [
                    'reference' => 47,
                    'locale' => 'en_GB',
                    'value' => 'Furnished',
                ],
                [
                    'reference' => 48,
                    'locale' => 'en_GB',
                    'value' => 'Linens',
                ],
                [
                    'reference' => 49,
                    'locale' => 'en_GB',
                    'value' => 'Tableware',
                ],
                [
                    'reference' => 50,
                    'locale' => 'en_GB',
                    'value' => 'Clothes dryer',
                ],
                [
                    'reference' => 51,
                    'locale' => 'en_GB',
                    'value' => 'Phone',
                ],
                [
                    'reference' => 52,
                    'locale' => 'en_GB',
                    'value' => 'Refrigerator',
                ],
                [
                    'reference' => 53,
                    'locale' => 'en_GB',
                    'value' => 'Oven',
                ],
                [
                    'reference' => 54,
                    'locale' => 'en_GB',
                    'value' => 'Reception 24/7',
                ],
                [
                    'reference' => 55,
                    'locale' => 'en_GB',
                    'value' => 'Coffeemaker',
                ],
                [
                    'reference' => 56,
                    'locale' => 'en_GB',
                    'value' => 'Microwave oven',
                ],
                [
                    'reference' => 57,
                    'locale' => 'en_GB',
                    'value' => 'Shabbat elevator',
                ],
                [
                    'reference' => 58,
                    'locale' => 'en_GB',
                    'value' => 'Sukkah',
                ],
                [
                    'reference' => 59,
                    'locale' => 'en_GB',
                    'value' => 'Synagogue',
                ],
                [
                    'reference' => 60,
                    'locale' => 'en_GB',
                    'value' => 'Digicode',
                ],
                [
                    'reference' => 61,
                    'locale' => 'en_GB',
                    'value' => 'Common laundry',
                ],
                [
                    'reference' => 62,
                    'locale' => 'en_GB',
                    'value' => 'Pets allowed',
                ],
                [
                    'reference' => 63,
                    'locale' => 'en_GB',
                    'value' => 'Metal shutters',
                ],
                [
                    'reference' => 64,
                    'locale' => 'en_GB',
                    'value' => 'Wiring closet',
                ],
                [
                    'reference' => 65,
                    'locale' => 'en_GB',
                    'value' => 'Computer network',
                ],
                [
                    'reference' => 66,
                    'locale' => 'en_GB',
                    'value' => 'Dropped ceiling',
                ],
                [
                    'reference' => 67,
                    'locale' => 'en_GB',
                    'value' => 'Fire hose cabinets',
                ],
                [
                    'reference' => 68,
                    'locale' => 'en_GB',
                    'value' => 'Fire sprinkler system',
                ],
                [
                    'reference' => 69,
                    'locale' => 'en_GB',
                    'value' => 'Wharf',
                ],
                [
                    'reference' => 70,
                    'locale' => 'en_GB',
                    'value' => 'Connected thermostat',
                ],
                [
                    'reference' => 71,
                    'locale' => 'en_GB',
                    'value' => 'Bowling green',
                ],
                [
                    'reference' => 72,
                    'locale' => 'en_GB',
                    'value' => 'Water softener',
                ],
                [
                    'reference' => 73,
                    'locale' => 'en_GB',
                    'value' => 'Triple glazing',
                ],
                [
                    'reference' => 74,
                    'locale' => 'en_GB',
                    'value' => 'Well drilling',
                ],
                [
                    'reference' => 75,
                    'locale' => 'en_GB',
                    'value' => 'Optical fiber',
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
        Schema::dropIfExists('apimo_property_service');
    }
}
