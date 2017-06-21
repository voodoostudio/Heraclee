<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class ModifyApimoComments
 */
class ModifyApimoComments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('apimo_property_comments', function (Blueprint $table) {
            $table->string('language', 10)->change();
            $table->string('hook')->nullable()->change();
            $table->string('title')->nullable()->change();
            $table->string('subtitle')->nullable()->change();
            $table->text('comment')->nullable()->change();
            $table->text('comment_full')->nullable()->change();
            $table->string('hash', 100)->unique();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
