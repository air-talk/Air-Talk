<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlashcardsansweredTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('flashcard_user', function($table)
        {
            $table->integer('flashcard_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('attempts');
            $table->integer('correct');
            $table->timestamps();

            $table->primary(['flashcard_id', 'user_id']);

            $table->foreign('flashcard_id')->references('id')->on('flashcards');
            $table->foreign('user_id')->references('id')->on('users');
        });	
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('flashcard_user');
	}

}
