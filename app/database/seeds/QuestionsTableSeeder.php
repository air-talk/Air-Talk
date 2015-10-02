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
        	"Select the proper way to say 8,500";
        $question->right_answer = 'eight thousand, five hundred';
        $question->wrong_answer1 = 'eight point five';
        $question->wrong_answer2 = 'eight and a half thousand';
        $question->wrong_answer3 = 'eighty five hundred';
        $question->category = 'nontowered';
        $question->save();
  
        $question = new Question();
        $question->question = 
        	"Select the proper way for a pilot to say 121.9";
        $question->right_answer = 'one two one point niner';
        $question->wrong_answer1 = 'one two one point nine';
        $question->wrong_answer2 = 'one twenty-one point niner';
        $question->wrong_answer3 = 'point niner';
        $question->category = 'nontowered';
        $question->save();

        $question = new Question();
        $question->question = 
        	"Select the proper way for a pilot to say [Runway] 26R";
        $question->right_answer = 'two six right';
        $question->wrong_answer1 = 'two six romeo';
        $question->wrong_answer2 = 'twenty-six right';
        $question->wrong_answer3 = 'two six arr';
        $question->category = 'nontowered';
        $question->save();

        $question = new Question();
        $question->question = 
        	"Select the proper way for a pilot to say FL180";
        $question->right_answer = 'flight level one eight zero';
        $question->wrong_answer1 = 'flight level eighteen thousand';
        $question->wrong_answer2 = 'eighteen thousand';
        $question->wrong_answer3 = 'one eight zero';
        $question->category = 'nontowered';
        $question->save();

        $question = new Question();
        $question->question = 
        	"You are on downwind leg, left-hand pattern for Runway 18. You have not quire reached the turn for base leg. You hear the following radio call from another aircraft: \"Sundance traffic, Cherokee seven two zero four kilo, downwind, Runway 18, Sundance\" <br> In which window would you expect to see Cherokee 7204K?";
        $question->right_answer = 'not in sight, at your 6 o\'clock';
        $question->wrong_answer1 = 'left windscreen';
        $question->wrong_answer2 = 'rear right window';
        $question->wrong_answer3 = 'straight ahead';
        $question->category = 'nontowered';
        $question->save();

        $question = new Question();
        $question->question = 
        	"Initial callup to a Class D airport sould be made at about what distance from the airport?";
        $question->right_answer = '15 miles';
        $question->wrong_answer1 = '5 miles';
        $question->wrong_answer2 = '10 miles';
        $question->wrong_answer3 = '20 miles';
        $question->category = 'classd';
        $question->save();

        $question = new Question();
        $question->question = 
        	"It is generally good practice to remain on the tower frequency of an airport until:";
        $question->right_answer = 'exiting the airport\'s surface area';
        $question->wrong_answer1 = 'you are 15 miles from the airport';
        $question->wrong_answer2 = 'you are 10 miles from the airport';
        $question->wrong_answer3 = 'the tower dismisses you';
        $question->category = 'classd';
        $question->save();

        $question = new Question();
        $question->question = 
        	"What will ATC use to describe a flight path parallel to the landing runway in the direction of landing?";
        $question->right_answer = 'upwind leg';
        $question->wrong_answer1 = 'crosswind leg';
        $question->wrong_answer2 = 'downwind leg';
        $question->wrong_answer3 = 'base leg';
        $question->category = 'classd';
        $question->save();

        $question = new Question();
        $question->question = 
        	"What will ATC use to describe a flight path at right angles to the landing runway off its takeoff end?";
        $question->right_answer = 'crosswind leg';
        $question->wrong_answer1 = 'upwind leg';
        $question->wrong_answer2 = 'downwind leg';
        $question->wrong_answer3 = 'base leg';
        $question->category = 'classd';
        $question->save();

        $question = new Question();
        $question->question = 
        	"What will ATC use to describe a flight path parallel to the landing runway in the opposite direction of landing?";
        $question->right_answer = 'downwind leg';
        $question->wrong_answer1 = 'upwind leg';
        $question->wrong_answer2 = 'final approach';
        $question->wrong_answer3 = 'base leg';
        $question->category = 'classd';
        $question->save();

        $question = new Question();
        $question->question = 
        	"What will ATC use to describe a flight path at right angles to the landing runway off its approach end and extending from the downwind leg to the intersection of the extended runway centerline?";
        $question->right_answer = 'base leg';
        $question->wrong_answer1 = 'upwind leg';
        $question->wrong_answer2 = 'final approach';
        $question->wrong_answer3 = 'departure leg';
        $question->category = 'classd';
        $question->save();

        $question = new Question();
        $question->question = 
        	"What will ATC use to describe a flight path in the direction of landing along the extended runway centerline from the base leg to the runway?";
        $question->right_answer = 'final approach';
        $question->wrong_answer1 = 'upwind leg';
        $question->wrong_answer2 = 'crosswind leg';
        $question->wrong_answer3 = 'departure leg';
        $question->category = 'classd';
        $question->save();

        $question = new Question();
        $question->question = 
        	"What will ATC use to describe a flight path which begins after takeoff and continues straight ahead along the extended runway centerline?";
        $question->right_answer = 'departure leg';
        $question->wrong_answer1 = 'upwind leg';
        $question->wrong_answer2 = 'base leg';
        $question->wrong_answer3 = 'final approach';
        $question->category = 'classd';
        $question->save();

        $question = new Question();
        $question->question = 
        	"The departure climb continues until reaching a point at least ____ mile(s) beyond the departure end of the runway and within ____ feet of the traffic pattern altitude";
        $question->right_answer = '1/2, 300';
        $question->wrong_answer1 = '1, 500';
        $question->wrong_answer2 = '2, 50';
        $question->wrong_answer3 = '5, 100';
        $question->category = 'classd';
        $question->save();

        $question = new Question();
        $question->question = 
        	"Select the proper way for a pilot to say [Runway] 26R";
        $question->right_answer = 'two six right';
        $question->wrong_answer1 = 'two six romeo';
        $question->wrong_answer2 = 'twenty-six right';
        $question->wrong_answer3 = 'two six arr';
        $question->category = 'classb';
        $question->save();

        $question = new Question();
        $question->question = 
        	"Select the proper way for a pilot to say [Runway] 26R";
        $question->right_answer = 'two six right';
        $question->wrong_answer1 = 'two six romeo';
        $question->wrong_answer2 = 'twenty-six right';
        $question->wrong_answer3 = 'two six arr';
        $question->category = 'classc';
        $question->save();
  
	}

}