<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SyncLastTime extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sync_last_time', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('timestamp');
            $table->timestamps();
        });

        DB::table('sync_last_time')->insert(
            [
                [
                    'timestamp' => 0,
                ]
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
        Schema::dropIfExists('sync_last_time');
    }
}
