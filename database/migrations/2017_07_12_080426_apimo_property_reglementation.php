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
