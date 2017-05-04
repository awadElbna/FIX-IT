<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 300);
            $table->text('desc');
            $table->string('img')->nullable();
            $table->unsignedInteger('visited')->default(0);
            $table->timestamp('created')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->enum('status', ['open', 'closed'])->default('open');
            $table->unsignedInteger('cat_id');
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
        Schema::dropIfExists('questions');
    }
}
