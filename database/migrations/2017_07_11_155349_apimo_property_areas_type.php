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
                    'value' => 'Superficie terrain',
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
                [
                    'reference' => 1,
                    'locale' => 'en_GB',
                    'value' => 'Bedroom',
                    'value_plurial' => 'Bedrooms',
                ],
                [
                    'reference' => 2,
                    'locale' => 'en_GB',
                    'value' => 'Living-room',
                    'value_plurial' => 'Living-rooms',
                ],
                [
                    'reference' => 3,
                    'locale' => 'en_GB',
                    'value' => 'Kitchen',
                    'value_plurial' => 'Kitchens',
                ],
                [
                    'reference' => 4,
                    'locale' => 'en_GB',
                    'value' => 'Garage',
                    'value_plurial' => 'Garages',
                ],
                [
                    'reference' => 5,
                    'locale' => 'en_GB',
                    'value' => 'Parking',
                    'value_plurial' => 'Parkings',
                ],
                [
                    'reference' => 6,
                    'locale' => 'en_GB',
                    'value' => 'Cellar',
                    'value_plurial' => 'Cellars',
                ],
                [
                    'reference' => 7,
                    'locale' => 'en_GB',
                    'value' => 'Garden shelter',
                    'value_plurial' => 'Garden shelters',
                ],
                [
                    'reference' => 8,
                    'locale' => 'en_GB',
                    'value' => 'Bathroom',
                    'value_plurial' => 'Bathrooms',
                ],
                [
                    'reference' => 9,
                    'locale' => 'en_GB',
                    'value' => 'Laundry room',
                    'value_plurial' => 'Laundry rooms',
                ],
                [
                    'reference' => 10,
                    'locale' => 'en_GB',
                    'value' => 'Study',
                    'value_plurial' => 'Studies',
                ],
                [
                    'reference' => 11,
                    'locale' => 'en_GB',
                    'value' => 'Hallway',
                    'value_plurial' => 'Hallways',
                ],
                [
                    'reference' => 12,
                    'locale' => 'en_GB',
                    'value' => 'Corridor',
                    'value_plurial' => 'Corridors',
                ],
                [
                    'reference' => 13,
                    'locale' => 'en_GB',
                    'value' => 'Shower room',
                    'value_plurial' => 'Shower rooms',
                ],
                [
                    'reference' => 14,
                    'locale' => 'en_GB',
                    'value' => 'Walk-in closet',
                    'value_plurial' => 'Walk-in closets',
                ],
                [
                    'reference' => 15,
                    'locale' => 'en_GB',
                    'value' => 'Entrance',
                    'value_plurial' => 'Entrance',
                ],
                [
                    'reference' => 16,
                    'locale' => 'en_GB',
                    'value' => 'Lavatory',
                    'value_plurial' => 'Lavatorys',
                ],
                [
                    'reference' => 17,
                    'locale' => 'en_GB',
                    'value' => 'Veranda',
                    'value_plurial' => 'Veranda',
                ],
                [
                    'reference' => 18,
                    'locale' => 'en_GB',
                    'value' => 'Terrace',
                    'value_plurial' => 'Terraces',
                ],
                [
                    'reference' => 19,
                    'locale' => 'en_GB',
                    'value' => 'Solarium',
                    'value_plurial' => 'Solariums',
                ],
                [
                    'reference' => 20,
                    'locale' => 'en_GB',
                    'value' => 'Living room/dining area',
                    'value_plurial' => 'Living rooms/dining area',
                ],
                [
                    'reference' => 21,
                    'locale' => 'en_GB',
                    'value' => 'Play room',
                    'value_plurial' => 'Play rooms',
                ],
                [
                    'reference' => 22,
                    'locale' => 'en_GB',
                    'value' => 'Dining room',
                    'value_plurial' => 'Dining rooms',
                ],
                [
                    'reference' => 23,
                    'locale' => 'en_GB',
                    'value' => 'Pool house',
                    'value_plurial' => 'Pool houses',
                ],
                [
                    'reference' => 24,
                    'locale' => 'en_GB',
                    'value' => 'Cupboard',
                    'value_plurial' => 'Cupboards',
                ],
                [
                    'reference' => 25,
                    'locale' => 'en_GB',
                    'value' => 'Not used',
                    'value_plurial' => 'Not used',
                ],
                [
                    'reference' => 26,
                    'locale' => 'en_GB',
                    'value' => 'Loggia',
                    'value_plurial' => 'Loggias',
                ],
                [
                    'reference' => 27,
                    'locale' => 'en_GB',
                    'value' => 'Attic',
                    'value_plurial' => 'Attics',
                ],
                [
                    'reference' => 28,
                    'locale' => 'en_GB',
                    'value' => 'Other',
                    'value_plurial' => 'Others',
                ],
                [
                    'reference' => 29,
                    'locale' => 'en_GB',
                    'value' => 'Mezzanine',
                    'value_plurial' => 'Mezzanines',
                ],
                [
                    'reference' => 30,
                    'locale' => 'en_GB',
                    'value' => 'Root cellar',
                    'value_plurial' => 'Root cellars',
                ],
                [
                    'reference' => 31,
                    'locale' => 'en_GB',
                    'value' => 'Maintenance room',
                    'value_plurial' => 'Maintenance rooms',
                ],
                [
                    'reference' => 32,
                    'locale' => 'en_GB',
                    'value' => 'Workshop',
                    'value_plurial' => 'Workshops',
                ],
                [
                    'reference' => 33,
                    'locale' => 'en_GB',
                    'value' => 'Studio',
                    'value_plurial' => 'Studios',
                ],
                [
                    'reference' => 34,
                    'locale' => 'en_GB',
                    'value' => 'Loft',
                    'value_plurial' => 'Lofts',
                ],
                [
                    'reference' => 35,
                    'locale' => 'en_GB',
                    'value' => 'Library',
                    'value_plurial' => 'Libraries',
                ],
                [
                    'reference' => 36,
                    'locale' => 'en_GB',
                    'value' => 'Closet',
                    'value_plurial' => 'Closets',
                ],
                [
                    'reference' => 37,
                    'locale' => 'en_GB',
                    'value' => 'Courtyard',
                    'value_plurial' => 'Courtyard',
                ],
                [
                    'reference' => 38,
                    'locale' => 'en_GB',
                    'value' => 'Landing',
                    'value_plurial' => 'Landings',
                ],
                [
                    'reference' => 39,
                    'locale' => 'en_GB',
                    'value' => 'Linen room',
                    'value_plurial' => 'Linen rooms',
                ],
                [
                    'reference' => 40,
                    'locale' => 'en_GB',
                    'value' => 'Basement',
                    'value_plurial' => 'Basements',
                ],
                [
                    'reference' => 41,
                    'locale' => 'en_GB',
                    'value' => 'Bathroom / Lavatory',
                    'value_plurial' => 'Bathrooms / Lavatories',
                ],
                [
                    'reference' => 42,
                    'locale' => 'en_GB',
                    'value' => 'Shower room / Lavatory',
                    'value_plurial' => 'Shower rooms / Lavatories',
                ],
                [
                    'reference' => 43,
                    'locale' => 'en_GB',
                    'value' => 'Balcony',
                    'value_plurial' => 'Balconies',
                ],
                [
                    'reference' => 44,
                    'locale' => 'en_GB',
                    'value' => 'Exercise room',
                    'value_plurial' => 'Exercise rooms',
                ],
                [
                    'reference' => 45,
                    'locale' => 'en_GB',
                    'value' => 'Discothèque',
                    'value_plurial' => 'Discothèques',
                ],
                [
                    'reference' => 46,
                    'locale' => 'en_GB',
                    'value' => 'Home cinema',
                    'value_plurial' => 'Home cinemas',
                ],
                [
                    'reference' => 47,
                    'locale' => 'en_GB',
                    'value' => 'Reception room',
                    'value_plurial' => 'Reception room',
                ],
                [
                    'reference' => 48,
                    'locale' => 'en_GB',
                    'value' => 'Storage room',
                    'value_plurial' => 'Storage rooms',
                ],
                [
                    'reference' => 49,
                    'locale' => 'en_GB',
                    'value' => 'Garden',
                    'value_plurial' => 'Gardens',
                ],
                [
                    'reference' => 50,
                    'locale' => 'en_GB',
                    'value' => 'Park',
                    'value_plurial' => 'Park',
                ],
                [
                    'reference' => 51,
                    'locale' => 'en_GB',
                    'value' => 'Land surface',
                    'value_plurial' => 'Lands',
                ],
                [
                    'reference' => 52,
                    'locale' => 'en_GB',
                    'value' => 'Patio',
                    'value_plurial' => 'Patios',
                ],
                [
                    'reference' => 53,
                    'locale' => 'en_GB',
                    'value' => 'Master bedroom',
                    'value_plurial' => 'Master bedrooms',
                ],
                [
                    'reference' => 54,
                    'locale' => 'en_GB',
                    'value' => 'Suite',
                    'value_plurial' => 'Suites',
                ],
                [
                    'reference' => 55,
                    'locale' => 'en_GB',
                    'value' => 'Carriage house',
                    'value_plurial' => 'Carriage houses',
                ],
                [
                    'reference' => 56,
                    'locale' => 'en_GB',
                    'value' => 'Apartment',
                    'value_plurial' => 'Apartments',
                ],
                [
                    'reference' => 57,
                    'locale' => 'en_GB',
                    'value' => 'Cabin',
                    'value_plurial' => 'Cabins',
                ],
                [
                    'reference' => 58,
                    'locale' => 'en_GB',
                    'value' => 'Barn',
                    'value_plurial' => 'Barn',
                ],
                [
                    'reference' => 59,
                    'locale' => 'en_GB',
                    'value' => 'Outbuilding',
                    'value_plurial' => 'Outbuildings',
                ],
                [
                    'reference' => 60,
                    'locale' => 'en_GB',
                    'value' => 'Bike storage room',
                    'value_plurial' => 'Bike storage rooms',
                ],
                [
                    'reference' => 61,
                    'locale' => 'en_GB',
                    'value' => 'Ski storage room',
                    'value_plurial' => 'Ski storage rooms',
                ],
                [
                    'reference' => 62,
                    'locale' => 'en_GB',
                    'value' => 'Garbage room',
                    'value_plurial' => 'Garbage rooms',
                ],
                [
                    'reference' => 63,
                    'locale' => 'en_GB',
                    'value' => 'Hammam',
                    'value_plurial' => 'Hammams',
                ],
                [
                    'reference' => 64,
                    'locale' => 'en_GB',
                    'value' => 'Indoor swimming pool',
                    'value_plurial' => 'Indoor swimming pools',
                ],
                [
                    'reference' => 65,
                    'locale' => 'en_GB',
                    'value' => 'Prayer room',
                    'value_plurial' => 'Prayer rooms',
                ],
                [
                    'reference' => 66,
                    'locale' => 'en_GB',
                    'value' => 'Sauna',
                    'value_plurial' => 'Saunas',
                ],
                [
                    'reference' => 67,
                    'locale' => 'en_GB',
                    'value' => 'Watchtower',
                    'value_plurial' => 'Watchtower',
                ],
                [
                    'reference' => 68,
                    'locale' => 'en_GB',
                    'value' => 'Room',
                    'value_plurial' => 'Rooms',
                ],
                [
                    'reference' => 69,
                    'locale' => 'en_GB',
                    'value' => 'Meeting room',
                    'value_plurial' => 'Meeting rooms',
                ],
                [
                    'reference' => 70,
                    'locale' => 'en_GB',
                    'value' => 'Maid\'s room',
                    'value_plurial' => 'Maid\'s rooms',
                ],
                [
                    'reference' => 71,
                    'locale' => 'en_GB',
                    'value' => 'Maid\'s studio',
                    'value_plurial' => 'Maid\'s studios',
                ],
                [
                    'reference' => 72,
                    'locale' => 'en_GB',
                    'value' => 'Double reception room',
                    'value_plurial' => 'Double reception rooms',
                ],
                [
                    'reference' => 73,
                    'locale' => 'en_GB',
                    'value' => 'Triple reception room',
                    'value_plurial' => 'Triple reception rooms',
                ],
                [
                    'reference' => 74,
                    'locale' => 'en_GB',
                    'value' => 'Indoor parking',
                    'value_plurial' => 'Indoor parkings',
                ],
                [
                    'reference' => 75,
                    'locale' => 'en_GB',
                    'value' => 'Outdoor parking',
                    'value_plurial' => 'Outdoor parkings',
                ],
                [
                    'reference' => 76,
                    'locale' => 'en_GB',
                    'value' => 'Stockroom',
                    'value_plurial' => 'Stockrooms',
                ],
                [
                    'reference' => 77,
                    'locale' => 'en_GB',
                    'value' => 'Shop',
                    'value_plurial' => 'Shops',
                ],
                [
                    'reference' => 78,
                    'locale' => 'en_GB',
                    'value' => 'Cafeteria',
                    'value_plurial' => 'Cafeterias',
                ],
                [
                    'reference' => 79,
                    'locale' => 'en_GB',
                    'value' => 'Lot',
                    'value_plurial' => 'Lots',
                ],
                [
                    'reference' => 80,
                    'locale' => 'en_GB',
                    'value' => 'Warehouse',
                    'value_plurial' => 'Warehouses',
                ],
                [
                    'reference' => 81,
                    'locale' => 'en_GB',
                    'value' => 'Accommodation',
                    'value_plurial' => 'Accommodations',
                ],
                [
                    'reference' => 82,
                    'locale' => 'en_GB',
                    'value' => 'Arcade',
                    'value_plurial' => 'Arcades',
                ],
                [
                    'reference' => 83,
                    'locale' => 'en_GB',
                    'value' => 'House',
                    'value_plurial' => 'Houses',
                ],
                [
                    'reference' => 84,
                    'locale' => 'en_GB',
                    'value' => 'Stair',
                    'value_plurial' => 'Stairs',
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
