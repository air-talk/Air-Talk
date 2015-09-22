<?php
use Faker\Factory as Faker;
class QuestionsTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create();

		for($i=0; $i<20; $i++)
		{
			$question = new Question();
			$question->question = $faker->text(20);
			$question->right_answer = $faker->text(4);
			$question->wrong_answer1 = $faker->text(4);
			$question->wrong_answer2 = $faker->text(4);
			$question->wrong_answer3 = $faker->text(4);
			$question->category = $faker->text(1);
			$question->save();	
		}    
	}

}