<?php
use Faker\Factory as Faker;
class QuestionsTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create();

        $question = new Question();
        $question->question = 
        	"When making any self-announced radio call in an uncontrolled airport pattern, what should you always say immediately prior to saying your call sign?";
        $question->right_answer = 'UNICOM';
        $question->wrong_answer1 = 'the name of the airport';
        $question->wrong_answer2 = 'traffic';
        $question->wrong_answer3 = 'the name of the airport plus "traffic"';
        $question->category = 'nontowered';
        $question->save();

        $question = new Question();
        $question->question = 
        	"When making any self-announced radio call in an uncontrolled airport pattern, what should you always say at the end of the call?";
        $question->right_answer = 'traffic';
        $question->wrong_answer1 = 'the name of the airport';
        $question->wrong_answer2 = 'call sign';
        $question->wrong_answer3 = 'over and out';
        $question->category = 'nontowered';
        $question->save();

        $question = new Question();
        $question->question = $question->question = $faker->realText(200);
        $question->right_answer = $faker->realText(10);
        $question->wrong_answer1 = $faker->realText(10);
        $question->wrong_answer2 = $faker->realText(10);
        $question->wrong_answer3 = $faker->realText(10);
        $question->category = 'nontowered';
        $question->save();

        $question = new Question();
        $question->question = $faker->realText(200);
        $question->right_answer = $faker->realText(10);
        $question->wrong_answer1 = $faker->realText(10);
        $question->wrong_answer2 = $faker->realText(10);
        $question->wrong_answer3 = $faker->realText(10);
        $question->category = 'nontowered';
        $question->save();

        $question = new Question();
        $question->question = $faker->realText(200);
        $question->right_answer = $faker->realText(10);
        $question->wrong_answer1 = $faker->realText(10);
        $question->wrong_answer2 = $faker->realText(10);
        $question->wrong_answer3 = $faker->realText(10);
        $question->category = 'nontowered';
        $question->save();

		for($i=0; $i<20; $i++)
		{
			$question = new Question();
			$question->question = $faker->realText(200);
			$question->right_answer = $faker->realText(10);
			$question->wrong_answer1 = $faker->realText(10);
			$question->wrong_answer2 = $faker->realText(10);
			$question->wrong_answer3 = $faker->realText(10);
			$question->category = 'nontowered';
			$question->save();	
		}    
	}

}