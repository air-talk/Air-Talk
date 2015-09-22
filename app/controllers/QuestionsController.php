<?php

class QuestionsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if(Input::has('cat')){
			//PAGINATES QUERY
			$category = Input::get('cat');
			$questions = Question::where('category', $category)->paginate(20);

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
		//stores the question created in the GAI
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//has a show page with the question to the user/admin through an interface
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


}
