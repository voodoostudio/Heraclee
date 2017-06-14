<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ApimoPrice extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apimo_price', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('property_id')->unique();
            $table->integer('value')->nullable();
            $table->integer('max')->nullable();
            $table->integer('fees')->nullable();
            $table->boolean('hide');
            $table->string('inventory')->nullable();
            $table->string('deposit')->nullable();
            $table->string('currency',10);
            $table->integer('commission')->nullable();
            $table->integer('commission_owner')->default(0);
            $table->integer('commission_customer')->default(0);
            $table->integer('sold')->nullable();
            $table->integer('sold_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('apimo_price');
    }
}
