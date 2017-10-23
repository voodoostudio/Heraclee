<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminGallerySettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_gallery_settings', function (Blueprint $table) {
            $table->integer('id');
            $table->string('page', 100)->nullable();
            $table->integer('show');
        });

        DB::table('admin_gallery_settings')->insert(
            [
                [
                    'id' => 1,
                    'page' => 'homepage',
                    'show' => 0,
                ],
                [
                    'id' => 2,
                    'page' => 'france',
                    'show' => 0,
                ],
                [
                    'id' => 3,
                    'page' => 'swiss',
                    'show' => 0,
                ],
                [
                    'id' => 4,
                    'page' => 'usa',
                    'show' => 0,
                ],
                [
                    'id' => 5,
                    'page' => 'mauritius',
                    'show' => 0,
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
        Schema::dropIfExists('admin_gallery_settings');
    }
}
