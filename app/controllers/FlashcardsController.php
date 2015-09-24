<?php

class FlashcardsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//shows a list of all the flashcards
		$query = Flashcard::with('users');

		$query->whereDoesntHave('users', function($q) {
			$q->where('id', Auth::id());
		});

		$flashcards = $query->get();

		

		return View::make('flashcards.index')->with(['flashcards' => $flashcards]);
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


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{

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
