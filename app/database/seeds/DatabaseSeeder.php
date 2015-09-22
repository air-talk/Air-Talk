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

		$this->call('UsersTableSeeder');
		$this->call('FlashcardsTableSeeder');
		$this->call('QuestionsTableSeeder');
	}

}
