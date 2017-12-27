<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminNewslettersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_newsletter', function (Blueprint $table) {
            $table->increments('id');
            $table->text('title_fr')->nullable();
            $table->text('title_en')->nullable();
            $table->string('front_image_path', 1024)->default('');
            $table->string('newsletter_html_path', 1024)->default('');
            $table->string('date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin_newsletter');
    }
}
