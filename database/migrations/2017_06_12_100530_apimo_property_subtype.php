<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ApimoPropertySubtype extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'apimo_property_subtype',
            function (Blueprint $table) {
                $table->integer('reference');
                $table->string('locale');
                $table->string('value');
                $table->string('value_plurial')->nullable();
            }
        );

        DB::table('apimo_property_subtype')->insert(
            [
                [
                    'reference' => 1,
                    'locale' => 'fr_FR',
                    'value' => 'Triplex',
                ],
                [
                    'reference' => 2,
                    'locale' => 'fr_FR',
                    'value' => 'Terrain constructible',
                ],
                [
                    'reference' => 3,
                    'locale' => 'fr_FR',
                    'value' => 'Terrain inconstructible',
                ],
                [
                    'reference' => 4,
                    'locale' => 'fr_FR',
                    'value' => 'Villa sur toit',
                ],
                [
                    'reference' => 5,
                    'locale' => 'fr_FR',
                    'value' => 'Appartement',
                ],
                [
                    'reference' => 6,
                    'locale' => 'fr_FR',
                    'value' => 'Studio',
                ],
                [
                    'reference' => 7,
                    'locale' => 'fr_FR',
                    'value' => 'Château',
                ],
                [
                    'reference' => 8,
                    'locale' => 'fr_FR',
                    'value' => 'Commerce',
                ],
                [
                    'reference' => 9,
                    'locale' => 'fr_FR',
                    'value' => 'Duplex',
                ],
                [
                    'reference' => 10,
                    'locale' => 'fr_FR',
                    'value' => 'Manoir',
                ],
                [
                    'reference' => 11,
                    'locale' => 'fr_FR',
                    'value' => 'Ferme',
                ],
                [
                    'reference' => 12,
                    'locale' => 'fr_FR',
                    'value' => 'Loft',
                ],
                [
                    'reference' => 13,
                    'locale' => 'fr_FR',
                    'value' => 'Maison de village',
                ],
                [
                    'reference' => 14,
                    'locale' => 'fr_FR',
                    'value' => 'Villa',
                ],
                [
                    'reference' => 15,
                    'locale' => 'fr_FR',
                    'value' => 'Appartement villa',
                ],
                [
                    'reference' => 16,
                    'locale' => 'fr_FR',
                    'value' => 'Grange',
                ],
                [
                    'reference' => 17,
                    'locale' => 'fr_FR',
                    'value' => 'Ruine',
                ],
                [
                    'reference' => 18,
                    'locale' => 'fr_FR',
                    'value' => 'Maison',
                ],
                [
                    'reference' => 19,
                    'locale' => 'fr_FR',
                    'value' => 'Propriété',
                ],
                [
                    'reference' => 20,
                    'locale' => 'fr_FR',
                    'value' => 'Ensemble immobilier',
                ],
                [
                    'reference' => 21,
                    'locale' => 'fr_FR',
                    'value' => 'Moulin',
                ],
                [
                    'reference' => 22,
                    'locale' => 'fr_FR',
                    'value' => 'Garage',
                ],
                [
                    'reference' => 23,
                    'locale' => 'fr_FR',
                    'value' => 'Fermette',
                ],
                [
                    'reference' => 24,
                    'locale' => 'fr_FR',
                    'value' => 'Immeuble',
                ],
                [
                    'reference' => 25,
                    'locale' => 'fr_FR',
                    'value' => 'Maison de ville',
                ],
                [
                    'reference' => 26,
                    'locale' => 'fr_FR',
                    'value' => 'Mobile home',
                ],
                [
                    'reference' => 27,
                    'locale' => 'fr_FR',
                    'value' => 'Chaumière',
                ],
                [
                    'reference' => 28,
                    'locale' => 'fr_FR',
                    'value' => 'Chambre',
                ],
                [
                    'reference' => 29,
                    'locale' => 'fr_FR',
                    'value' => 'Hangar',
                ],
                [
                    'reference' => 30,
                    'locale' => 'fr_FR',
                    'value' => 'Mas',
                ],
                [
                    'reference' => 31,
                    'locale' => 'fr_FR',
                    'value' => 'Local',
                ],
                [
                    'reference' => 32,
                    'locale' => 'fr_FR',
                    'value' => 'Chalet',
                ],
                [
                    'reference' => 33,
                    'locale' => 'fr_FR',
                    'value' => 'Local commercial',
                ],
                [
                    'reference' => 34,
                    'locale' => 'fr_FR',
                    'value' => 'Fonds de commerce',
                ],
                [
                    'reference' => 35,
                    'locale' => 'fr_FR',
                    'value' => 'Droit au bail',
                ],
                [
                    'reference' => 36,
                    'locale' => 'fr_FR',
                    'value' => 'Bureau',
                ],
                [
                    'reference' => 37,
                    'locale' => 'fr_FR',
                    'value' => 'Hôtel particulier',
                ],
                [
                    'reference' => 38,
                    'locale' => 'fr_FR',
                    'value' => 'Gérance',
                ],
                [
                    'reference' => 39,
                    'locale' => 'fr_FR',
                    'value' => 'Exploitation agricole',
                ],
                [
                    'reference' => 40,
                    'locale' => 'fr_FR',
                    'value' => 'Cave',
                ],
                [
                    'reference' => 41,
                    'locale' => 'fr_FR',
                    'value' => 'Entrepôt',
                ],
                [
                    'reference' => 42,
                    'locale' => 'fr_FR',
                    'value' => 'Remise',
                ],
                [
                    'reference' => 43,
                    'locale' => 'fr_FR',
                    'value' => 'Parking',
                ],
                [
                    'reference' => 44,
                    'locale' => 'fr_FR',
                    'value' => 'Hôtel',
                ],
                [
                    'reference' => 45,
                    'locale' => 'fr_FR',
                    'value' => 'Haras',
                ],
                [
                    'reference' => 46,
                    'locale' => 'fr_FR',
                    'value' => 'Terrain',
                ],
                [
                    'reference' => 47,
                    'locale' => 'fr_FR',
                    'value' => 'Bastide',
                ],
                [
                    'reference' => 48,
                    'locale' => 'fr_FR',
                    'value' => 'Bastidon',
                ],
                [
                    'reference' => 49,
                    'locale' => 'fr_FR',
                    'value' => 'Entreprise',
                ],
                [
                    'reference' => 50,
                    'locale' => 'fr_FR',
                    'value' => 'Propriété viticole',
                ],
                [
                    'reference' => 51,
                    'locale' => 'fr_FR',
                    'value' => 'Yacht',
                ],
                [
                    'reference' => 52,
                    'locale' => 'fr_FR',
                    'value' => 'Péniche',
                ],
                [
                    'reference' => 53,
                    'locale' => 'fr_FR',
                    'value' => 'Voilier',
                ],
                [
                    'reference' => 54,
                    'locale' => 'fr_FR',
                    'value' => 'Catamaran',
                ],
                [
                    'reference' => 55,
                    'locale' => 'fr_FR',
                    'value' => 'Domaine équestre',
                ],
                [
                    'reference' => 56,
                    'locale' => 'fr_FR',
                    'value' => 'Maison d\'hôtes',
                ],
                [
                    'reference' => 57,
                    'locale' => 'fr_FR',
                    'value' => 'Gîte',
                ],
                [
                    'reference' => 58,
                    'locale' => 'fr_FR',
                    'value' => 'Riad',
                ],
                [
                    'reference' => 59,
                    'locale' => 'fr_FR',
                    'value' => 'Box',
                ],
                [
                    'reference' => 60,
                    'locale' => 'fr_FR',
                    'value' => 'Attique',
                ],
                [
                    'reference' => 61,
                    'locale' => 'fr_FR',
                    'value' => 'Arcade',
                ],
                [
                    'reference' => 62,
                    'locale' => 'fr_FR',
                    'value' => 'Boutique',
                ],
                [
                    'reference' => 63,
                    'locale' => 'fr_FR',
                    'value' => 'Atelier',
                ],
                [
                    'reference' => 1,
                    'locale' => 'en_GB',
                    'value' => 'Triplex',
                ],
                [
                    'reference' => 2,
                    'locale' => 'en_GB',
                    'value' => 'Building land',
                ],
                [
                    'reference' => 3,
                    'locale' => 'en_GB',
                    'value' => 'Not constructible land',
                ],
                [
                    'reference' => 4,
                    'locale' => 'en_GB',
                    'value' => 'Penthouse',
                ],
                [
                    'reference' => 5,
                    'locale' => 'en_GB',
                    'value' => 'Apartment',
                ],
                [
                    'reference' => 6,
                    'locale' => 'en_GB',
                    'value' => 'Studio',
                ],
                [
                    'reference' => 7,
                    'locale' => 'en_GB',
                    'value' => 'Castle',
                ],
                [
                    'reference' => 8,
                    'locale' => 'en_GB',
                    'value' => 'Business',
                ],
                [
                    'reference' => 9,
                    'locale' => 'en_GB',
                    'value' => 'Duplex',
                ],
                [
                    'reference' => 10,
                    'locale' => 'en_GB',
                    'value' => 'Manor house',
                ],
                [
                    'reference' => 11,
                    'locale' => 'en_GB',
                    'value' => 'Farm',
                ],
                [
                    'reference' => 12,
                    'locale' => 'en_GB',
                    'value' => 'Loft',
                ],
                [
                    'reference' => 13,
                    'locale' => 'en_GB',
                    'value' => 'Village house',
                ],
                [
                    'reference' => 14,
                    'locale' => 'en_GB',
                    'value' => 'Villa',
                ],
                [
                    'reference' => 15,
                    'locale' => 'en_GB',
                    'value' => 'Apartment villa',
                ],
                [
                    'reference' => 16,
                    'locale' => 'en_GB',
                    'value' => 'Barn',
                ],
                [
                    'reference' => 17,
                    'locale' => 'en_GB',
                    'value' => 'Ruin',
                ],
                [
                    'reference' => 18,
                    'locale' => 'en_GB',
                    'value' => 'House',
                ],
                [
                    'reference' => 19,
                    'locale' => 'en_GB',
                    'value' => 'Property',
                ],
                [
                    'reference' => 20,
                    'locale' => 'en_GB',
                    'value' => 'Housing estate',
                ],
                [
                    'reference' => 21,
                    'locale' => 'en_GB',
                    'value' => 'Mill',
                ],
                [
                    'reference' => 22,
                    'locale' => 'en_GB',
                    'value' => 'Carpark',
                ],
                [
                    'reference' => 23,
                    'locale' => 'en_GB',
                    'value' => 'Farmhouse',
                ],
                [
                    'reference' => 24,
                    'locale' => 'en_GB',
                    'value' => 'Building',
                ],
                [
                    'reference' => 25,
                    'locale' => 'en_GB',
                    'value' => 'Townhouse',
                ],
                [
                    'reference' => 26,
                    'locale' => 'en_GB',
                    'value' => 'Mobile home',
                ],
                [
                    'reference' => 27,
                    'locale' => 'en_GB',
                    'value' => 'Cottage',
                ],
                [
                    'reference' => 28,
                    'locale' => 'en_GB',
                    'value' => 'Bedroom',
                ],
                [
                    'reference' => 29,
                    'locale' => 'en_GB',
                    'value' => 'Hangar',
                ],
                [
                    'reference' => 30,
                    'locale' => 'en_GB',
                    'value' => 'Mas',
                ],
                [
                    'reference' => 31,
                    'locale' => 'en_GB',
                    'value' => 'Local',
                ],
                [
                    'reference' => 32,
                    'locale' => 'en_GB',
                    'value' => 'Chalet',
                ],
                [
                    'reference' => 33,
                    'locale' => 'en_GB',
                    'value' => 'Premises',
                ],
                [
                    'reference' => 34,
                    'locale' => 'en_GB',
                    'value' => 'Business assets',
                ],
                [
                    'reference' => 35,
                    'locale' => 'en_GB',
                    'value' => 'Right to the lease',
                ],
                [
                    'reference' => 36,
                    'locale' => 'en_GB',
                    'value' => 'Office',
                ],
                [
                    'reference' => 37,
                    'locale' => 'en_GB',
                    'value' => 'Mansion',
                ],
                [
                    'reference' => 38,
                    'locale' => 'en_GB',
                    'value' => 'Management',
                ],
                [
                    'reference' => 39,
                    'locale' => 'en_GB',
                    'value' => 'Agricultural exploitation',
                ],
                [
                    'reference' => 40,
                    'locale' => 'en_GB',
                    'value' => 'Cellar',
                ],
                [
                    'reference' => 41,
                    'locale' => 'en_GB',
                    'value' => 'Warehouse',
                ],
                [
                    'reference' => 42,
                    'locale' => 'en_GB',
                    'value' => 'Woodshed',
                ],
                [
                    'reference' => 43,
                    'locale' => 'en_GB',
                    'value' => 'Parking',
                ],
                [
                    'reference' => 44,
                    'locale' => 'en_GB',
                    'value' => 'Hotel',
                ],
                [
                    'reference' => 45,
                    'locale' => 'en_GB',
                    'value' => 'Stud farm',
                ],
                [
                    'reference' => 46,
                    'locale' => 'en_GB',
                    'value' => 'Plot of land',
                ],
                [
                    'reference' => 47,
                    'locale' => 'en_GB',
                    'value' => 'Bastide',
                ],
                [
                    'reference' => 48,
                    'locale' => 'en_GB',
                    'value' => 'Bastidon',
                ],
                [
                    'reference' => 49,
                    'locale' => 'en_GB',
                    'value' => 'Company',
                ],
                [
                    'reference' => 50,
                    'locale' => 'en_GB',
                    'value' => 'Vineyard property',
                ],
                [
                    'reference' => 51,
                    'locale' => 'en_GB',
                    'value' => 'Motor Yacht',
                ],
                [
                    'reference' => 52,
                    'locale' => 'en_GB',
                    'value' => 'Narrow boat',
                ],
                [
                    'reference' => 53,
                    'locale' => 'en_GB',
                    'value' => 'Sailing Yacht',
                ],
                [
                    'reference' => 54,
                    'locale' => 'en_GB',
                    'value' => 'Catamaran',
                ],
                [
                    'reference' => 55,
                    'locale' => 'en_GB',
                    'value' => 'Equestrian estate',
                ],
                [
                    'reference' => 56,
                    'locale' => 'en_GB',
                    'value' => 'Bed and breakfast',
                ],
                [
                    'reference' => 57,
                    'locale' => 'en_GB',
                    'value' => 'Gîte',
                ],
                [
                    'reference' => 58,
                    'locale' => 'en_GB',
                    'value' => 'Riad',
                ],
                [
                    'reference' => 59,
                    'locale' => 'en_GB',
                    'value' => 'Box',
                ],
                [
                    'reference' => 60,
                    'locale' => 'en_GB',
                    'value' => 'Attic',
                ],
                [
                    'reference' => 61,
                    'locale' => 'en_GB',
                    'value' => 'Arcade',
                ],
                [
                    'reference' => 62,
                    'locale' => 'en_GB',
                    'value' => 'Retail',
                ],
                [
                    'reference' => 63,
                    'locale' => 'en_GB',
                    'value' => 'Workshop',
                ],
                [
                    'reference' => 64,
                    'locale' => 'en_GB',
                    'value' => 'Shophouse',
                ],
                [
                    'reference' => 65,
                    'locale' => 'en_GB',
                    'value' => 'Borey',
                ],
                [
                    'reference' => 66,
                    'locale' => 'en_GB',
                    'value' => 'Condo',
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
        Schema::dropIfExists('apimo_property_subtype');
    }
}
