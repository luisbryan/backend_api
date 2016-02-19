<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_histories', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('test_question_id');
            $table->integer('test_question_answer_id');
            $table->integer('test_id');
            $table->boolean('correct_answer');
            $table->softDeletes();
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
        Schema::drop('test_histories');
    }
}
