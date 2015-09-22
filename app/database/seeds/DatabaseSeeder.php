<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		DB::table('users')->delete();
		DB::table('questions')->delete();
		DB::table('flashcards')->delete();

		$this->call('UsersTableSeeder');
		$this->call('FlashcardsTableSeeder');
		$this->call('QuestionsTableSeeder');
	}

}
