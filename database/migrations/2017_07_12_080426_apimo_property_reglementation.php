<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ApimoPropertyReglementation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apimo_property_reglementation', function (Blueprint $table) {
            $table->integer('reference');
            $table->string('locale');
            $table->string('value');
            $table->string('value_plurial')->nullable();
        });

        DB::table('apimo_property_reglementation')->insert(
            [
                [
                    'reference' => 1,
                    'locale' => 'fr_FR',
                    'value' => 'Énergie - Consommation conventionnelle',
                ],
                [
                    'reference' => 2,
                    'locale' => 'fr_FR',
                    'value' => 'Énergie - Estimation des émissions',
                ],
                [
                    'reference' => 3,
                    'locale' => 'fr_FR',
                    'value' => 'ERNT',
                ],
                [
                    'reference' => 4,
                    'locale' => 'fr_FR',
                    'value' => 'Mois',
                ],
                [
                    'reference' => 5,
                    'locale' => 'fr_FR',
                    'value' => 'Termites',
                ],
                [
                    'reference' => 6,
                    'locale' => 'fr_FR',
                    'value' => 'Amiante',
                ],
                [
                    'reference' => 7,
                    'locale' => 'fr_FR',
                    'value' => 'Gaz',
                ],
                [
                    'reference' => 8,
                    'locale' => 'fr_FR',
                    'value' => 'Plomb',
                ],
                [
                    'reference' => 9,
                    'locale' => 'fr_FR',
                    'value' => 'Électricité',
                ],
                [
                    'reference' => 10,
                    'locale' => 'fr_FR',
                    'value' => 'Loi Boutin',
                ],
                [
                    'reference' => 11,
                    'locale' => 'fr_FR',
                    'value' => 'Assainissement',
                ],
                [
                    'reference' => 12,
                    'locale' => 'fr_FR',
                    'value' => 'Indice prestazione energetica (EPI)',
                ],
                [
                    'reference' => 13,
                    'locale' => 'fr_FR',
                    'value' => 'Attestato Certificazione Energetica (ACE)',
                ],
                [
                    'reference' => 14,
                    'locale' => 'fr_FR',
                    'value' => 'Demande de désignation d\'un mandataire ad hoc',
                ],
                [
                    'reference' => 15,
                    'locale' => 'fr_FR',
                    'value' => 'Demande de désignation d\'un administrateur provisoire',
                ],
                [
                    'reference' => 16,
                    'locale' => 'fr_FR',
                    'value' => 'Demande de désignation d\'expert(s)',
                ],
                [
                    'reference' => 17,
                    'locale' => 'fr_FR',
                    'value' => 'Normes relatives à la sécurité incendie',
                ],
                [
                    'reference' => 18,
                    'locale' => 'fr_FR',
                    'value' => 'Normes accessibilité aux personnes handicapées',
                ],
                [
                    'reference' => 19,
                    'locale' => 'fr_FR',
                    'value' => 'Agrément sanitaire',
                ],
                [
                    'reference' => 20,
                    'locale' => 'fr_FR',
                    'value' => 'Consommation d\'énergie',
                ],
                [
                    'reference' => 21,
                    'locale' => 'fr_FR',
                    'value' => 'Consommation d\'énergie',
                ],
                [
                    'reference' => 22,
                    'locale' => 'fr_FR',
                    'value' => 'Taxe foncière',
                ],
                [
                    'reference' => 23,
                    'locale' => 'fr_FR',
                    'value' => 'Taxe d\'habitation',
                ],
                [
                    'reference' => 24,
                    'locale' => 'fr_FR',
                    'value' => 'Charges foncières',
                ],
                [
                    'reference' => 25,
                    'locale' => 'fr_FR',
                    'value' => 'Taxe foncière',
                ],
                [
                    'reference' => 26,
                    'locale' => 'fr_FR',
                    'value' => 'Taxe foncière',
                ],
                [
                    'reference' => 27,
                    'locale' => 'fr_FR',
                    'value' => 'Réservé aux résidents',
                ],
                [
                    'reference' => 28,
                    'locale' => 'fr_FR',
                    'value' => 'IPTU',
                ],
                [
                    'reference' => 30,
                    'locale' => 'fr_FR',
                    'value' => 'Minergie',
                ],
                [
                    'reference' => 31,
                    'locale' => 'fr_FR',
                    'value' => 'Volume',
                ],
                [
                    'reference' => 32,
                    'locale' => 'fr_FR',
                    'value' => 'Surface utile',
                ],
                [
                    'reference' => 33,
                    'locale' => 'fr_FR',
                    'value' => 'PPE (Propriété par étages)	',
                ],
                [
                    'reference' => 34,
                    'locale' => 'fr_FR',
                    'value' => 'Taux d\'imposition communal',
                ],
                [
                    'reference' => 35,
                    'locale' => 'fr_FR',
                    'value' => 'No extrait registre foncier',
                ],
                [
                    'reference' => 36,
                    'locale' => 'fr_FR',
                    'value' => 'Droit de superficie',
                ],
                [
                    'reference' => 37,
                    'locale' => 'fr_FR',
                    'value' => 'Millièmes',
                ],
                [
                    'reference' => 38,
                    'locale' => 'fr_FR',
                    'value' => 'Taxe d\'habitation',
                ],
                [
                    'reference' => 39,
                    'locale' => 'fr_FR',
                    'value' => 'Budget PPE',
                ],
                [
                    'reference' => 40,
                    'locale' => 'fr_FR',
                    'value' => 'Fond de rénovation actuel',
                ],
                [
                    'reference' => 41,
                    'locale' => 'fr_FR',
                    'value' => 'Coefficient d’utilisation du sol',
                ],
                [
                    'reference' => 42,
                    'locale' => 'fr_FR',
                    'value' => 'Coefficient d’occupation au sol',
                ],
                [
                    'reference' => 43,
                    'locale' => 'fr_FR',
                    'value' => 'Coefficient d’emprise au sol',
                ],
                [
                    'reference' => 44,
                    'locale' => 'fr_FR',
                    'value' => 'Coefficient d’occupation au sol',
                ],
                [
                    'reference' => 45,
                    'locale' => 'fr_FR',
                    'value' => 'Délai de priorité CCH L443-11',
                ],
                [
                    'reference' => 46,
                    'locale' => 'fr_FR',
                    'value' => 'Autorisation de vente CCH L443-12',
                ],
                [
                    'reference' => 47,
                    'locale' => 'fr_FR',
                    'value' => 'Division parcellaire',
                ],
                [
                    'reference' => 48,
                    'locale' => 'fr_FR',
                    'value' => 'Délibération conseil d’administration/surveillance',
                ],
                [
                    'reference' => 1,
                    'locale' => 'en_GB',
                    'value' => 'Energy - Conventional consumption',
                ],
                [
                    'reference' => 2,
                    'locale' => 'en_GB',
                    'value' => 'Energy - Emissions estimate',
                ],
                [
                    'reference' => 3,
                    'locale' => 'en_GB',
                    'value' => '« Carrez » act',
                ],
                [
                    'reference' => 4,
                    'locale' => 'en_GB',
                    'value' => 'Natural : technical hazards',
                ],
                [
                    'reference' => 5,
                    'locale' => 'en_GB',
                    'value' => 'Termites',
                ],
                [
                    'reference' => 6,
                    'locale' => 'en_GB',
                    'value' => 'Asbestos',
                ],
                [
                    'reference' => 7,
                    'locale' => 'en_GB',
                    'value' => 'Gas',
                ],
                [
                    'reference' => 8,
                    'locale' => 'en_GB',
                    'value' => 'Lead',
                ],
                [
                    'reference' => 9,
                    'locale' => 'en_GB',
                    'value' => 'Electricity',
                ],
                [
                    'reference' => 10,
                    'locale' => 'en_GB',
                    'value' => 'Boutin act',
                ],
                [
                    'reference' => 11,
                    'locale' => 'en_GB',
                    'value' => 'Sanitation',
                ],
                [
                    'reference' => 12,
                    'locale' => 'en_GB',
                    'value' => 'Indice prestazione energetica (EPI)',
                ],
                [
                    'reference' => 13,
                    'locale' => 'en_GB',
                    'value' => 'Attestato Certificazione Energetica (ACE)',
                ],
                [
                    'reference' => 14,
                    'locale' => 'en_GB',
                    'value' => 'Request for nomination of an ad hoc agent',
                ],
                [
                    'reference' => 15,
                    'locale' => 'en_GB',
                    'value' => 'Request for nomination of a temporary administrator',
                ],
                [
                    'reference' => 16,
                    'locale' => 'en_GB',
                    'value' => 'Request for expert nomination',
                ],
                [
                    'reference' => 20,
                    'locale' => 'en_GB',
                    'value' => 'Energy consumption',
                ],
                [
                    'reference' => 21,
                    'locale' => 'en_GB',
                    'value' => 'Energy consumption',
                ],
                [
                    'reference' => 22,
                    'locale' => 'en_GB',
                    'value' => 'Land value tax',
                ],
                [
                    'reference' => 23,
                    'locale' => 'en_GB',
                    'value' => 'Housing tax',
                ],
                [
                    'reference' => 25,
                    'locale' => 'en_GB',
                    'value' => 'Land value tax',
                ],
                [
                    'reference' => 26,
                    'locale' => 'en_GB',
                    'value' => 'Land value tax',
                ],
                [
                    'reference' => 28,
                    'locale' => 'en_GB',
                    'value' => 'IPTU',
                ],
                [
                    'reference' => 30,
                    'locale' => 'en_GB',
                    'value' => 'Minergie',
                ],
                [
                    'reference' => 33,
                    'locale' => 'en_GB',
                    'value' => 'Co-Ownership property',
                ],
                [
                    'reference' => 34,
                    'locale' => 'en_GB',
                    'value' => 'Taux d\'imposition communal',
                ],
                [
                    'reference' => 36,
                    'locale' => 'en_GB',
                    'value' => 'Droit de superficie',
                ],
                [
                    'reference' => 37,
                    'locale' => 'en_GB',
                    'value' => 'Millièmes',
                ],
                [
                    'reference' => 38,
                    'locale' => 'en_GB',
                    'value' => 'Housing tax',
                ],
                [
                    'reference' => 40,
                    'locale' => 'en_GB',
                    'value' => 'Current renovation fund',
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
        Schema::dropIfExists('apimo_property_reglementation');
    }
}
