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
		$flashcards = DB::table('flashcards')->get();
			return View::make('flashcards.index')->with(['flashcards' => $flashcards]);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//has a show page to add a new flashcard to the database through a nice GAI(graphical admin interface)
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//stores the flashcard created in the GAI
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//has a show page with the flashcard to the user/admin through an interface
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//has a show page with the flashcard to the admin through the GAI
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//updates the flashcard that was editted in the edit GAI
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
