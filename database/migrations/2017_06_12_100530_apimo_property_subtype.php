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
