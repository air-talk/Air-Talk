<?php

class UnfinishedQuestionsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$questions = UnfinishedQuestionsController::unfinishedQuestions()->get()->toArray();
		dd($questions[0]['id']);
		if(Input::has('cat')){
			$category = Input::get('cat');	
			$questions = UnfinishedQuestionsController::unfinishedQuestions()->where('category', $category)->paginate(20);

			return View::make('unfinished_questions.index')->with(['questions'=> $questions]);
		}else{
			$questions = UnfinishedQuestionsController::unfinishedQuestions()->paginate(20);
			dd($questions->toArray());
			return View::make('unfinished_questions.index')->with(['questions' => $questions]);
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

			return Redirect::action('UnfinishedQuestionsController@show', $question->id)->with(array('question', $question));
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
		$questions = UnfinishedQuestionsController::unfinishedQuestions()->get()->toArray();
		$questionId = $questions[$id+1]['id'];
		if(Question::find($questionId)){		
			$question = Question::find($questionId);
			return View::make('unfinished_questions.show')->with(['question' => $question]);
		}else{
			App::abort(404);
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
				return Redirect::action('UnfinishedQuestionsController@show', $question->id)->with(array('question', $question));
			}else{
				//show next incorrect question
			}

		}
		Auth::user()->correctQuestions()->attach($id);
		$question = Question::find($id+1);
		return Redirect::action('UnfinishedQuestionsController@show', $question->id)->with(array('question', $question));
	}

	public function unfinishedQuestions()
	{
		$questions = Question::whereDoesntHave('users', function($q) {
			$q->where('id', Auth::id());
		});

		return $questions;
	}



}
