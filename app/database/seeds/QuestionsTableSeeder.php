<?php
use Faker\Factory as Faker;
class QuestionsTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create();

		for($i=0; $i<20; $i++)
		{
			$question = new Question();
			$question->question = $faker->text(200);
			$question->right_answer = $faker->text(10);
			$question->wrong_answer1 = $faker->text(10);
			$question->wrong_answer2 = $faker->text(10);
			$question->wrong_answer3 = $faker->text(10);
			$question->category = 'untowered';
			$question->save();	
		}    
	}

}