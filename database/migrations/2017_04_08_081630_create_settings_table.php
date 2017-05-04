<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 70);
            $table->string('copyrights', 70);
            $table->text('meta_description');
            $table->text('meta_keywords');
            $table->string('fb_account', 70);
            $table->string('tw_account', 70);
            $table->string('yt_account', 70);
            $table->string('gp_account', 70);
            $table->text('google_ann');
            $table->string('webmaster_email', 50);
            $table->string('support_email', 50);
            $table->string('phone', 50);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
