<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ApimoComments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apimo_property_comments', function (Blueprint $table) {
            $table->integer('property_id');
            $table->string('language');
            $table->string('title');
            $table->string('subtitle');
            $table->string('hook');
            $table->text('comment');
            $table->text('comment_full');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('apimo_property_comments');
    }
}
