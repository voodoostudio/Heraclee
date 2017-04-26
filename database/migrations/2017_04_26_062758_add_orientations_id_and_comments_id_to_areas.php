<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOrientationsIdAndCommentsIdToAreas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('areas', function($table){
            $table->integer('orientations_id')->nullable()->after('floor_id');
            $table->integer('comments_id')->nullable()->after('orientations_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('areas', function ($table) {
            $table->dropColumn('orientations_id');
            $table->dropColumn('comments_id');
        });
    }
}
