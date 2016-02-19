<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestMediasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_medias', function (Blueprint $table) {
	        $table->increments('id');
	        $table->string('name');
	        $table->string('file_name');
	        $table->string('file');
	        $table->string('test_id')->nullable();
	        $table->string('question_id')->nullable();
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
        Schema::drop('test_medias');
    }
}
