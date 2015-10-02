<?php
use Faker\Factory as Faker;
class QuestionsTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create();

        $question = new Question();
        $question->question = 
        	"When making any self-announced radio call in an uncontrolled airport pattern, what should you always say immediately prior to saying your call sign?";
        $question->right_answer = 'the name of the airport plus "traffic"';
        $question->wrong_answer1 = 'the name of the airport';
        $question->wrong_answer2 = 'traffic';
        $question->wrong_answer3 = 'UNICOM';
        $question->category = 'nontowered';
        $question->save();

        $question = new Question();
        $question->question = 
        	"When making any self-announced radio call in an uncontrolled airport pattern, what should you always say at the end of the call?";
        $question->right_answer = 'the name of the airport';
        $question->wrong_answer1 = 'traffic';
        $question->wrong_answer2 = 'call sign';
        $question->wrong_answer3 = 'over and out';
        $question->category = 'nontowered';
        $question->save();

        $question = new Question();
        $question->question = 
        	"Which of these is not one of the four Ws of the majority of radio calls?";
        $question->right_answer = 'When you will arrive';
        $question->wrong_answer1 = 'Who you are';
        $question->wrong_answer2 = 'Who you\'re calling';
        $question->wrong_answer3 = 'Where you are';
        $question->category = 'nontowered';
        $question->save();
  
	}

}