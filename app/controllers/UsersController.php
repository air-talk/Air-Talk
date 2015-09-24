<?php

class UsersController extends \BaseController {

	public function showSignin()
	{
		if(Auth::check()){
			return Redirect::action('HomeController@showWelcome');
		}else{
			return View::make('users.signin');
		}
	}

	public function doSignin()
	{
		$email = Input::get('email');
		$password = Input::get('password');

		if(Auth::attempt(array('email' => $email, 'password' => $password))){
			return Redirect::intended('/');
		}else{
			Session::flash('errorMessage', 'Email and password combination failed.');
			Log::info('validator failed', Input::all());
			return Redirect::action('UsersController@showSignin');
		}
	}

	public function doSignout()
	{
		Auth::logout();
		Session::flash('successMessage', 'Goodbye!');
		return View::make('users.signin');
	}

	public function create()
	{
		if(!Auth::check()){
			return View::make('users.create');
		}else{
			return Redirect::action('UsersController@show', Auth::id());
		}
	}
	// FOR ELOQUENT
	// public function newUser()
	// {
	// 	$validator = Validator::make(Input::all(), User::$rules);
	// 	if($validator->fails()){
	// 		Session::flash('errorMessage', 'Something went wrong, refer to the red text below:');
	// 		Log::info('validator failed', Input::all());
	// 		return Redirect::back()->withInput()->withErrors($validator);
	// 	}else{	
	// 		$user = new User();
	// 		$user->email = Input::get('email');
	// 		$user->password = Input::get('password');
	// 		$user->first_name = Input::get('first_name');
	// 		$user->last_name = Input::get('last_name');
	// 		$user->save();

	// 		$email = Input::get('email');
	// 		$password = Input::get('password');
	// 		Auth::attempt(array('email' => $email, 'password' => $password));
	// 		return Redirect::action('UsersController@show');
	// 	}

	// FOR ESENSI
	public function store()
	{
		$user = new User();

		// populate the model with the form data
		$user->email = Input::get('email');
		$user->password = Input::get('password');
		$user->first_name = Input::get('first_name');
		$user->last_name = Input::get('last_name');

		if (!$user->save()) {
		     $errors = $user->getErrors();
		     return Redirect::action('UsersController@create')
		       ->with('errors', $errors)
		       ->withInput();
		}

		   // success!
			// Mail::send('emailTemplate', array('firstname'=>Input::get('first_name')), function($message){
		 //        $message->to(Input::get('email'), Input::get('firstname').' '.Input::get('lastname'))->subject('Welcome to Airtalk!');
		 //    });
			$email = Input::get('email');
			$password = Input::get('password');
			Auth::attempt(array('email' => $email, 'password' => $password));
		    return Redirect::action('UsersController@index', Auth::id())->with('message', 'Account with email of ' . $user->email . ' has been created!');
		
	 }

	public function index()
	{
		if(User::find(Auth::user()->id)){
			$user = User::find(Auth::user()->id);
			return View::make('users.show')->with('user', $user);
		}else{
			App::abort(404);
		}
	}

	public function edit($id)
	{
		if(Auth::id() == $id){
			$user = Auth::user();
			return View::make('users.edit')->with('user',$user);
		}else{
			return Redirect::action('UsersController@show');
		}
	}

	public function update()
	{
		//check if they used correct current password before allowing edits
		if (Hash::check(Input::get('current_password'), Auth::user()->password))
		{
			$user = User::find(Auth::user()->id);
			$user->first_name = Input::get('first_name');
			$user->last_name = Input::get('last_name');
			$user->email = Input::get('email');
			$user->password = Input::get('password');

			if (!$user->save()) {
			     $errors = $user->getErrors();
			     return Redirect::action('UsersController@edit', Auth::id())->with('errors', $errors)->withInput();
			}

		    // success!
			$email = Input::get('email');
			$password = Input::get('password');
			Auth::attempt(array('email' => $email, 'password' => $password));
		    return Redirect::action('UsersController@show', Auth::id())->with('successMessage', 'Account with email of ' . $user->email . ' has been succesfully edited!');
		}else{
			// current password didn't match database
			return Redirect::action('UsersController@edit', Auth::id())->with('errorMessage', 'Current password was incorrect.');
		}
	}
}