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
            $table->string('question', 20000);
            $table->string('right_answer', 20000);
            $table->string('wrong_answer1', 20000);
            $table->string('wrong_answer2', 20000);
            $table->string('wrong_answer3', 20000);
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
