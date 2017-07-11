<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ApimoPropertyAreasType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apimo_property_areas_type', function (Blueprint $table) {
            $table->integer('reference');
            $table->string('locale');
            $table->string('value');
            $table->string('value_plurial')->nullable();
        });

        DB::table('apimo_property_areas_type')->insert(
            [
                [
                    'reference' => 1,
                    'locale' => 'fr_FR',
                    'value' => 'Chambre',
                    'value_plurial' => 'Chambres',
                ],
                [
                    'reference' => 2,
                    'locale' => 'fr_FR',
                    'value' => 'Salon',
                    'value_plurial' => 'Salons',
                ],
                [
                    'reference' => 3,
                    'locale' => 'fr_FR',
                    'value' => 'Cuisine',
                    'value_plurial' => 'Cuisines',
                ],
                [
                    'reference' => 4,
                    'locale' => 'fr_FR',
                    'value' => 'Garage',
                    'value_plurial' => 'Garages',
                ],
                [
                    'reference' => 5,
                    'locale' => 'fr_FR',
                    'value' => 'Parking',
                    'value_plurial' => 'Parkings',
                ],
                [
                    'reference' => 6,
                    'locale' => 'fr_FR',
                    'value' => 'Cave',
                    'value_plurial' => 'Caves',
                ],
                [
                    'reference' => 7,
                    'locale' => 'fr_FR',
                    'value' => 'Abri de jardin',
                    'value_plurial' => 'Abris de jardin',
                ],
                [
                    'reference' => 8,
                    'locale' => 'fr_FR',
                    'value' => 'Salle de bains',
                    'value_plurial' => 'Salles de bains',
                ],
                [
                    'reference' => 9,
                    'locale' => 'fr_FR',
                    'value' => 'Buanderie',
                    'value_plurial' => 'Buanderies',
                ],
                [
                    'reference' => 10,
                    'locale' => 'fr_FR',
                    'value' => 'Bureau',
                    'value_plurial' => 'Bureaux',
                ],
                [
                    'reference' => 11,
                    'locale' => 'fr_FR',
                    'value' => 'Couloir',
                    'value_plurial' => 'Couloirs',
                ],
                [
                    'reference' => 12,
                    'locale' => 'fr_FR',
                    'value' => 'Dégagement',
                    'value_plurial' => 'Dégagements',
                ],
                [
                    'reference' => 13,
                    'locale' => 'fr_FR',
                    'value' => 'Salle de douche',
                    'value_plurial' => 'Salles de douche',
                ],
                [
                    'reference' => 14,
                    'locale' => 'fr_FR',
                    'value' => 'Dressing',
                    'value_plurial' => 'Dressings',
                ],
                [
                    'reference' => 15,
                    'locale' => 'fr_FR',
                    'value' => 'Entrée',
                    'value_plurial' => 'Entrées',
                ],
                [
                    'reference' => 16,
                    'locale' => 'fr_FR',
                    'value' => 'Toilettes',
                    'value_plurial' => 'Toilettes',
                ],
                [
                    'reference' => 17,
                    'locale' => 'fr_FR',
                    'value' => 'Véranda',
                    'value_plurial' => 'Vérandas',
                ],
                [
                    'reference' => 18,
                    'locale' => 'fr_FR',
                    'value' => 'Terrasse',
                    'value_plurial' => 'Terrasses',
                ],
                [
                    'reference' => 19,
                    'locale' => 'fr_FR',
                    'value' => 'Solarium',
                    'value_plurial' => 'Solariums',
                ],
                [
                    'reference' => 20,
                    'locale' => 'fr_FR',
                    'value' => 'Séjour',
                    'value_plurial' => 'Séjours',
                ],
                [
                    'reference' => 21,
                    'locale' => 'fr_FR',
                    'value' => 'Salle de jeux',
                    'value_plurial' => 'Salles de jeux',
                ],
                [
                    'reference' => 22,
                    'locale' => 'fr_FR',
                    'value' => 'Salle à manger',
                    'value_plurial' => 'Salles à manger',
                ],
                [
                    'reference' => 23,
                    'locale' => 'fr_FR',
                    'value' => 'Pool house',
                    'value_plurial' => 'Pool houses',
                ],
                [
                    'reference' => 24,
                    'locale' => 'fr_FR',
                    'value' => 'Placard',
                    'value_plurial' => 'Placards',
                ],
                [
                    'reference' => 25,
                    'locale' => 'fr_FR',
                    'value' => 'Non exploité',
                    'value_plurial' => 'Non exploités',
                ],
                [
                    'reference' => 26,
                    'locale' => 'fr_FR',
                    'value' => 'Loggia',
                    'value_plurial' => 'Loggias',
                ],
                [
                    'reference' => 27,
                    'locale' => 'fr_FR',
                    'value' => 'Grenier',
                    'value_plurial' => 'Greniers',
                ],
                [
                    'reference' => 28,
                    'locale' => 'fr_FR',
                    'value' => 'Autre',
                    'value_plurial' => 'Autres',
                ],
                [
                    'reference' => 29,
                    'locale' => 'fr_FR',
                    'value' => 'Mezzanine',
                    'value_plurial' => 'Mezzanines',
                ],
                [
                    'reference' => 30,
                    'locale' => 'fr_FR',
                    'value' => 'Cellier',
                    'value_plurial' => 'Celliers',
                ],
                [
                    'reference' => 31,
                    'locale' => 'fr_FR',
                    'value' => 'Local technique',
                    'value_plurial' => 'Locaux techniques',
                ],
                [
                    'reference' => 32,
                    'locale' => 'fr_FR',
                    'value' => 'Atelier',
                    'value_plurial' => 'Ateliers',
                ],
                [
                    'reference' => 33,
                    'locale' => 'fr_FR',
                    'value' => 'Studio',
                    'value_plurial' => 'Studios',
                ],
                [
                    'reference' => 34,
                    'locale' => 'fr_FR',
                    'value' => 'Loft',
                    'value_plurial' => 'Lofts',
                ],
                [
                    'reference' => 35,
                    'locale' => 'fr_FR',
                    'value' => 'Bibliothèque',
                    'value_plurial' => 'Bibliothèques',
                ],
                [
                    'reference' => 36,
                    'locale' => 'fr_FR',
                    'value' => 'Penderie',
                    'value_plurial' => 'Penderies',
                ],
                [
                    'reference' => 37,
                    'locale' => 'fr_FR',
                    'value' => 'Cour',
                    'value_plurial' => 'Cours',
                ],
                [
                    'reference' => 38,
                    'locale' => 'fr_FR',
                    'value' => 'Palier',
                    'value_plurial' => 'Paliers',
                ],
                [
                    'reference' => 39,
                    'locale' => 'fr_FR',
                    'value' => 'Lingerie',
                    'value_plurial' => 'Lingeries',
                ],
                [
                    'reference' => 40,
                    'locale' => 'fr_FR',
                    'value' => 'Sous-sol',
                    'value_plurial' => 'Sous-sol',
                ],
                [
                    'reference' => 41,
                    'locale' => 'fr_FR',
                    'value' => 'Salle de bains / toilettes',
                    'value_plurial' => 'Salles de bains / toilettes',
                ],
                [
                    'reference' => 42,
                    'locale' => 'fr_FR',
                    'value' => 'Salle de douche / toilettes',
                    'value_plurial' => 'Salles de douche / toilettes',
                ],
                [
                    'reference' => 43,
                    'locale' => 'fr_FR',
                    'value' => 'Balcon',
                    'value_plurial' => 'Balcons',
                ],
                [
                    'reference' => 44,
                    'locale' => 'fr_FR',
                    'value' => 'Salle de sport',
                    'value_plurial' => 'Salles de sport',
                ],
                [
                    'reference' => 45,
                    'locale' => 'fr_FR',
                    'value' => 'Boîte de nuit',
                    'value_plurial' => 'Boîtes de nuit',
                ],
                [
                    'reference' => 46,
                    'locale' => 'fr_FR',
                    'value' => 'Cinéma',
                    'value_plurial' => 'Cinémas',
                ],
                [
                    'reference' => 47,
                    'locale' => 'fr_FR',
                    'value' => 'Salle de réception',
                    'value_plurial' => 'Salles de réception',
                ],
                [
                    'reference' => 48,
                    'locale' => 'fr_FR',
                    'value' => 'Débarras',
                    'value_plurial' => 'Débarras',
                ],
                [
                    'reference' => 49,
                    'locale' => 'fr_FR',
                    'value' => 'Jardin',
                    'value_plurial' => 'Jardins',
                ],
                [
                    'reference' => 50,
                    'locale' => 'fr_FR',
                    'value' => 'Parc',
                    'value_plurial' => 'Parcs',
                ],
                [
                    'reference' => 51,
                    'locale' => 'fr_FR',
                    'value' => 'Terrain',
                    'value_plurial' => 'Terrains',
                ],
                [
                    'reference' => 52,
                    'locale' => 'fr_FR',
                    'value' => 'Patio',
                    'value_plurial' => 'Patios',
                ],
                [
                    'reference' => 53,
                    'locale' => 'fr_FR',
                    'value' => 'Chambre de maître',
                    'value_plurial' => 'Chambres de maître',
                ],
                [
                    'reference' => 54,
                    'locale' => 'fr_FR',
                    'value' => 'Suite',
                    'value_plurial' => 'Suites',
                ],
                [
                    'reference' => 55,
                    'locale' => 'fr_FR',
                    'value' => 'Remise',
                    'value_plurial' => 'Remises',
                ],
                [
                    'reference' => 56,
                    'locale' => 'fr_FR',
                    'value' => 'Appartement',
                    'value_plurial' => 'Appartements',
                ],
                [
                    'reference' => 57,
                    'locale' => 'fr_FR',
                    'value' => 'Cabine',
                    'value_plurial' => 'Cabines',
                ],
                [
                    'reference' => 58,
                    'locale' => 'fr_FR',
                    'value' => 'Grange',
                    'value_plurial' => 'Granges',
                ],
                [
                    'reference' => 59,
                    'locale' => 'fr_FR',
                    'value' => 'Dépendance',
                    'value_plurial' => 'Dépendances',
                ],
                [
                    'reference' => 60,
                    'locale' => 'fr_FR',
                    'value' => 'Local à vélos',
                    'value_plurial' => 'Locaux à vélos',
                ],
                [
                    'reference' => 61,
                    'locale' => 'fr_FR',
                    'value' => 'Local à skis',
                    'value_plurial' => 'Locaux à skis',
                ],
                [
                    'reference' => 62,
                    'locale' => 'fr_FR',
                    'value' => 'Local à poubelles',
                    'value_plurial' => 'Locaux à poubelles',
                ],
                [
                    'reference' => 63,
                    'locale' => 'fr_FR',
                    'value' => 'Hammam',
                    'value_plurial' => 'Hammams',
                ],
                [
                    'reference' => 64,
                    'locale' => 'fr_FR',
                    'value' => 'Piscine intérieure',
                    'value_plurial' => 'Piscines intérieures',
                ],
                [
                    'reference' => 65,
                    'locale' => 'fr_FR',
                    'value' => 'Salle de prière',
                    'value_plurial' => 'Salles de prière',
                ],
                [
                    'reference' => 66,
                    'locale' => 'fr_FR',
                    'value' => 'Sauna',
                    'value_plurial' => 'Saunas',
                ],
                [
                    'reference' => 67,
                    'locale' => 'fr_FR',
                    'value' => 'Mirador',
                    'value_plurial' => 'Miradors',
                ],
                [
                    'reference' => 68,
                    'locale' => 'fr_FR',
                    'value' => 'Salle',
                    'value_plurial' => 'Salles',
                ],
                [
                    'reference' => 69,
                    'locale' => 'fr_FR',
                    'value' => 'Salle de réunion',
                    'value_plurial' => 'Salles de réunion',
                ],
                [
                    'reference' => 70,
                    'locale' => 'fr_FR',
                    'value' => 'Chambre de service',
                    'value_plurial' => 'Chambres de service',
                ],
                [
                    'reference' => 71,
                    'locale' => 'fr_FR',
                    'value' => 'Studio de service',
                    'value_plurial' => 'Studios de service',
                ],
                [
                    'reference' => 72,
                    'locale' => 'fr_FR',
                    'value' => 'Double réception',
                    'value_plurial' => 'Doubles réceptions',
                ],
                [
                    'reference' => 73,
                    'locale' => 'fr_FR',
                    'value' => 'Triple réception',
                    'value_plurial' => 'Triples réceptions',
                ],
                [
                    'reference' => 74,
                    'locale' => 'fr_FR',
                    'value' => 'Parking intérieur',
                    'value_plurial' => 'Parkings intérieurs',
                ],
                [
                    'reference' => 75,
                    'locale' => 'fr_FR',
                    'value' => 'Parking extérieur',
                    'value_plurial' => 'Parkings extérieurs',
                ],
                [
                    'reference' => 76,
                    'locale' => 'fr_FR',
                    'value' => 'Stock / Réserve',
                    'value_plurial' => 'Stocks / Réserves',
                ],
                [
                    'reference' => 77,
                    'locale' => 'fr_FR',
                    'value' => 'Commerce',
                    'value_plurial' => 'Commerces',
                ],
                [
                    'reference' => 78,
                    'locale' => 'fr_FR',
                    'value' => 'Cafétéria',
                    'value_plurial' => 'Cafétérias',
                ],
                [
                    'reference' => 79,
                    'locale' => 'fr_FR',
                    'value' => 'Lot',
                    'value_plurial' => 'Lots',
                ],
                [
                    'reference' => 80,
                    'locale' => 'fr_FR',
                    'value' => 'Entrepôt',
                    'value_plurial' => 'Entrepôts',
                ],
                [
                    'reference' => 81,
                    'locale' => 'fr_FR',
                    'value' => 'Logement',
                    'value_plurial' => 'Logements',
                ],
                [
                    'reference' => 82,
                    'locale' => 'fr_FR',
                    'value' => 'Arcade',
                    'value_plurial' => 'Arcades',
                ],
                [
                    'reference' => 83,
                    'locale' => 'fr_FR',
                    'value' => 'Maison',
                    'value_plurial' => 'Maisons',
                ],
                [
                    'reference' => 84,
                    'locale' => 'fr_FR',
                    'value' => 'Escalier',
                    'value_plurial' => 'Escaliers',
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
        Schema::dropIfExists('apimo_property_areas_type');
    }
}
