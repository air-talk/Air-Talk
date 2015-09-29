<?php

class QuestionsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if(Input::has('unfin') && Input::has('cat')){
			$category = Input::get('cat');
			$questions = QuestionsController::unfinishedQuestions()->where('category', $category)->paginate(20);

			return View::make('questions.index')->with(['questions'=> $questions]);
		}elseif(Input::has('cat')){
			$category = Input::get('cat');
			$questions = Question::where('category', $category)->paginate(20);

			return View::make('questions.index')->with(['questions'=> $questions]);
		}elseif(Input::has('unfin')){
			$questions = QuestionsController::unfinishedQuestions()->paginate(20);

			return View::make('questions.index')->with(['questions'=> $questions]);
		}else{
			$questions = Question::paginate(20);

			return View::make('questions.index')->with(['questions'=> $questions]);
		}
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//has a show page to add a new question to the database through a nice GAI(graphical admin interface)
		return View::make('questions.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$question = new Question();
		$question->question = Input::get('question');
		$question->right_answer = Input::get('right_answer');
		$question->wrong_answer1 = Input::get('wrong_answer1');
		$question->wrong_answer2 = Input::get('wrong_answer2');
		$question->wrong_answer3 = Input::get('wrong_answer3');
		$question->category = Input::get('category');
		if(!$question->save()){
			$errors = $question->getErrors();
		}else{

			return Redirect::action('QuestionsController@show', $question->id)->with(array('question', $question));
		}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		if(Input::has('unfin') && Input::has('cat')){
			$category = Input::get('cat');
			$questions = QuestionsController::unfinishedQuestions()->where('category', $category)->get();

			return View::make('questions.show')->with(['questions'=> $questions]);
		}elseif(Input::has('cat')){
			$category = Input::get('cat');
			$questions = Question::where('category', $category)->get();

			return View::make('questions.show')->with(['questions'=> $questions]);
		}elseif(Input::has('unfin')){
			$questions = QuestionsController::unfinishedQuestions()->get();

			return View::make('questions.show')->with(['questions'=> $questions]);
		}else{
			$questions = Question::all();

			return View::make('questions.show')->with(['questions'=> $questions]);
		}
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//has a show page with the question to the admin through the GAI
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//updates the question that was editted in the edit GAI
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//deletes the question from the database through the GAI
	}

	public function storeAnswer($id)
	{
		if(Auth::user()->correctQuestions->contains($id)) {
			Auth::user()->correctQuestions()->detach($id);
			Auth::user()->correctQuestions()->attach($id);
			if($question = Question::find($id+1))
			{
				$question = Question::find($id+1);
				return Redirect::action('QuestionsController@show', $question->id)->with(array('question', $question));
			}
		}
		Auth::user()->correctQuestions()->attach($id);
		$question = Question::find($id+1);
		return Redirect::action('QuestionsController@show', $question->id)->with(array('question', $question));
	}

	public function unfinishedQuestions()
	{
		$questions = Question::whereDoesntHave('users', function($q) {
			$q->where('id', Auth::id());
		});

		return $questions;
	}

	public function getNextQuestion($index)
	{	
		if(Input::has('cat')){
			$questions = Question::where('category', '=', Input::get('cat'))->get();
			foreach($questions as $question){
				$questionArray[] = $question->id;
			}
			$nextQuestion = Question::findOrFail($questionArray[$index]);
			return Response::json($nextQuestion);	
		}else{	
			$questions = Question::all();
			foreach($questions as $question){
				$questionArray[] = $question->id;
			}
			$nextQuestion = Question::findOrFail($questionArray[$index]);
			return Response::json($nextQuestion);
		}
	}

	public function attempt($id)
	{
		return Response::json('success', 200);
	}



}
