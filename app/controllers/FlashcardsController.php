<?php

class FlashcardsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		
		$flashcards = Flashcard::where('category', 'vocab')->get();
		$answeredFlashcards = Auth::user()->answeredFlashcards()->orderBy(DB::raw('correct / attempts'))->get();
		
		$query = Flashcard::where('category', 'vocab');
		$query->whereDoesntHave('users', function($q) {
			$q->where('id', Auth::id());
		});

		$unansweredFlashcards = $query->get();

		$data = [
			'flashcards' => $flashcards,
			'answeredFlashcards' => $answeredFlashcards,
			'unansweredFlashcards' => $unansweredFlashcards
		];

		return View::make('flashcards.index')->with($data);
	}

	public function planesindex()
	{
		//shows a list of all the flashcards
		$flashcards = DB::table('flashcards')->where('category', '=', 'plane')->get();;

		

		return View::make('flashcards.planes')->with(['flashcards' => $flashcards]);
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

	public function storeAttemps()
	{
		$flashcard = new FlashcardAnswer	();

		// populate the model with the form data
		$flashcard->flashcard_id = Input::get('flashcard_id');
		$flashcard->user_id = Auth::id();

		$flashcard->correct;

		if (!$flashcard->save()) {
		     $errors = $flashcard->getErrors();
		     return Redirect::action('FlashcardsController@create')
		       ->with('errors', $errors)
		       ->withInput();
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

	
}
