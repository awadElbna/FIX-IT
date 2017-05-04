<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->text('comment');
            $table->unsignedInteger('parent_id')->default(0);
            $table->unsignedInteger('question_id');
            $table->integer('likes')->default(0);
            $table->timestamp('created')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->unsignedInteger('user_id');
            $table->softDeletes();
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
