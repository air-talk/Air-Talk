<?php

class FlashcardsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function __construct()
	{
		parent::__construct();
		$this->beforeFilter('auth');
		
	}
	
	public function index()
	{
		
		$answeredFlashcards = Auth::user()->answeredFlashcards()->orderBy(DB::raw('correct / attempts'))->get();
		
		$query = Flashcard::where('category', 'vocab');
		$query->whereDoesntHave('users', function($q) {
			$q->where('id', Auth::id());
		});

		$unansweredFlashcards = $query->get();

		$data = [
			'answeredFlashcards' => $answeredFlashcards,
			'unansweredFlashcards' => $unansweredFlashcards
		];

		return View::make('flashcards.index')->with($data);
	}

	public function planesindex()
	{
		$answeredFlashcards = Auth::user()->answeredFlashcards()->orderBy(DB::raw('correct / attempts'))->get();
		
		$query = Flashcard::where('category', 'plane');
		$query->whereDoesntHave('users', function($q) {
			$q->where('id', Auth::id());
		});

		$unansweredFlashcards = $query->get();

		$data = [
			'answeredFlashcards' => $answeredFlashcards,
			'unansweredFlashcards' => $unansweredFlashcards
		];

		return View::make('flashcards.planes')->with($data);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('flashcards.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$flashcard = new Flashcard();

		// populate the model with the form data
		$flashcard->front = Input::get('front');
		$flashcard->back = Input::get('back');
		$flashcard->category = Input::get('category');

		if (!$flashcard->save()) {
		     $errors = $flashcard->getErrors();
		     return Redirect::action('FlashcardsController@create')
		       ->with('errors', $errors)
		       ->withInput();
		}
	}

	public function attempt($id,$which)
	{
		return Response::json('success', 200);
		exit;
		$user = Auth::user();

			//if which = 39 then do these
		if($user->answeredFlashcards->contains($id)) {
			$flashcard = $user->answeredFlashcards()->where('flashcard_id', $id)->firstOrFail();

			$attempts = $flashcard->pivot->attempts + 1;
			$correct  = $flashcard->pivot->correct + 1;

			$user->answeredFlashcards()
				->updateExistingPivot($id, array('attempts' => $attempts, 'correct' => $correct));
		} else {
			// attach new pivot
			$attempts = 1;
			$correct  = 1;
			$user->answeredFlashcards()->attach($id, ['attempts' => 1, 'correct' => $correct]);
		}

		//if which = 37 then answered incorrect


	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		if(Flashcard::find($id)){		
			$flashcard = Flashcard::find($id);
			return View::make('flashcards.show')->with(['flashcard' => $flashcard]);
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
		$flashcard = $id;
		return View::make('flashcards.edit')->with('flashcard',$flashcard);

	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$flashcard = Flashcard::find($id);
		if(!$id)
		{
			Session::flash('errorMessage', "Flashcard with id of $id is not found"); 

			App::abort(404);
		}elseif($id){
			$flashcard->front = Input::get('front');
			$flashcard->back = Input::get('back');
			$flashcard->category = Input::get('category');

			if (!$flashcard->save()) {
			     $errors = $flashcard->getErrors();
			     return Redirect::action('FlashcardsController@edit', $id)->with('errors', $errors)->withInput();
			}

		    return Redirect::action('FlashcardsController@show', $id)->with('successMessage', 'Flashcard with id of ' . $flashcard->id . ' has been succesfully edited!');
		}else{
			// current password didn't match database
			return Redirect::action('FlashcardsController@edit', $id)->with('errorMessage', 'Something went wrong please try again.');
		}	
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//deletes the flashcard from the database through the GAI
	}


	public function unansweredFlashcards()
	{
		$flashcards = Flashcard::whereDoesntHave('users', function($q){
			$q->where('id', Auth::id());
		});

		return $flashcards;
	}


}
