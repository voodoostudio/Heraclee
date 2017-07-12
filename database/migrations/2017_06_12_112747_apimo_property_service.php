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
