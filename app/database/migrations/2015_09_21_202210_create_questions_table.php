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
            $table->text('question', 20000);
            $table->text('right_answer', 20000);
            $table->text('wrong_answer1', 20000);
            $table->text('wrong_answer2', 20000);
            $table->text('wrong_answer3', 20000);
            $table->text('category');
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
