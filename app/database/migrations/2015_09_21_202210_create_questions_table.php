<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('questions', function($table)
        {
            $table->increments('id');
            $table->string('question');
            $table->string('right_answer');
            $table->string('wrong_answer1');
            $table->string('wrong_answer2');
            $table->string('wrong_answer3');
            $table->string('category');
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
		Schema::drop('questions');
	}

}
