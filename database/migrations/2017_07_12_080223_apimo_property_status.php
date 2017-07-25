<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ApimoPropertyStatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apimo_property_status', function (Blueprint $table) {
            $table->integer('reference');
            $table->string('locale');
            $table->string('value');
            $table->string('value_plurial')->nullable();
        });

        DB::table('apimo_property_status')->insert(
            [
                [
                    'reference' => 1,
                    'locale' => 'fr_FR',
                    'value' => 'En cours',
                ],
                [
                    'reference' => 20,
                    'locale' => 'fr_FR',
                    'value' => 'Attente mandat',
                ],
                [
                    'reference' => 21,
                    'locale' => 'fr_FR',
                    'value' => 'Mandat expiré',
                ],
                [
                    'reference' => 22,
                    'locale' => 'fr_FR',
                    'value' => 'Sous offre / réservation',
                ],
                [
                    'reference' => 24,
                    'locale' => 'fr_FR',
                    'value' => 'Sous contrat vente/location',
                ],
                [
                    'reference' => 25,
                    'locale' => 'fr_FR',
                    'value' => 'Attente acte/bail',
                ],
                [
                    'reference' => 28,
                    'locale' => 'fr_FR',
                    'value' => 'Attente validation',
                ],
                [
                    'reference' => 29,
                    'locale' => 'fr_FR',
                    'value' => 'Autre',
                ],
                [
                    'reference' => 30,
                    'locale' => 'fr_FR',
                    'value' => 'Vendu/loué par l\'agence',
                ],
                [
                    'reference' => 31,
                    'locale' => 'fr_FR',
                    'value' => 'Vendu/loué par le propriétaire',
                ],
                [
                    'reference' => 32,
                    'locale' => 'fr_FR',
                    'value' => 'Vendu/loué par un confrère',
                ],
                [
                    'reference' => 33,
                    'locale' => 'fr_FR',
                    'value' => 'Retiré par l\'agence',
                ],
                [
                    'reference' => 34,
                    'locale' => 'fr_FR',
                    'value' => 'Retiré par le propriétaire',
                ],
                [
                    'reference' => 35,
                    'locale' => 'fr_FR',
                    'value' => 'Vente/location annulée',
                ],
                [
                    'reference' => 39,
                    'locale' => 'fr_FR',
                    'value' => 'Autre',
                ],
                [
                    'reference' => 40,
                    'locale' => 'fr_FR',
                    'value' => 'Détruire cette fiche',
                ],
                [
                    'reference' => 1,
                    'locale' => 'en_GB',
                    'value' => 'In progress',
                ],
                [
                    'reference' => 20,
                    'locale' => 'en_GB',
                    'value' => 'Waiting for agreement',
                ],
                [
                    'reference' => 21,
                    'locale' => 'en_GB',
                    'value' => 'Agreement ended',
                ],
                [
                    'reference' => 22,
                    'locale' => 'en_GB',
                    'value' => 'Offer',
                ],
                [
                    'reference' => 24,
                    'locale' => 'en_GB',
                    'value' => 'Processing sale',
                ],
                [
                    'reference' => 25,
                    'locale' => 'en_GB',
                    'value' => 'Waiting for contract',
                ],
                [
                    'reference' => 28,
                    'locale' => 'en_GB',
                    'value' => 'Pending approval',
                ],
                [
                    'reference' => 29,
                    'locale' => 'en_GB',
                    'value' => 'Other',
                ],
                [
                    'reference' => 30,
                    'locale' => 'en_GB',
                    'value' => 'Sell/Rent by agent',
                ],
                [
                    'reference' => 31,
                    'locale' => 'en_GB',
                    'value' => 'Sell/Rent by owner',
                ],
                [
                    'reference' => 32,
                    'locale' => 'en_GB',
                    'value' => 'Sell/Rent by other agent',
                ],
                [
                    'reference' => 33,
                    'locale' => 'en_GB',
                    'value' => 'Removed by agent',
                ],
                [
                    'reference' => 34,
                    'locale' => 'en_GB',
                    'value' => 'Removed by owner',
                ],
                [
                    'reference' => 35,
                    'locale' => 'en_GB',
                    'value' => 'Sale/Rental cancelled',
                ],
                [
                    'reference' => 39,
                    'locale' => 'en_GB',
                    'value' => 'Other',
                ],
                [
                    'reference' => 40,
                    'locale' => 'en_GB',
                    'value' => 'Destroy this product',
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
        Schema::dropIfExists('apimo_property_status');
    }
}
