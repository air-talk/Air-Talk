<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::post('login', 'UsersController@doSignin'); 
Route::get('logout', 'UsersController@doSignout');

Route::get('/', 'HomeController@showWelcome');
Route::get('login', 'UsersController@showSignin');

Route::resource('questions', 'QuestionsController');
Route::resource('flashcards', 'FlashcardsController');
Route::resource('profile', 'UsersController');
