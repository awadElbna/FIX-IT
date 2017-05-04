<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterLikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::Table('likes', function (Blueprint $table) {
          $table->integer('user_id')->unsigned();
          $table->integer('comment_id')->unsigned();
          $table->unique(['user_id', 'comment_id']);
          $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
          $table->foreign('comment_id')->references('id')->on('comments')->onDelete('cascade');

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
