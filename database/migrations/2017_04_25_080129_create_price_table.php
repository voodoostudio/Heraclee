<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePriceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('price', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('value');
            $table->integer('fees')->nullable();
            $table->boolean('hide')->default(false);
            $table->integer('inventory')->nullable();
            $table->integer('depozit')->nullable();
            $table->string('currency')->nullable();
            $table->integer('commision_owner')->nullable();
            $table->integer('commision_customer')->nullable();
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
        Schema::dropIfExists('price');
    }
}
