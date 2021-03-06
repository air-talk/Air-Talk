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
Route::get('signin', 'UsersController@showSignin');

Route::get('planes', 'FlashcardsController@planesindex');
Route::get('radiocalls', 'FlashcardsController@audioindex');

Route::post('flashcards/attempt/{id}/{which}', 'FlashcardsController@attempt');
Route::post('questions/attempt/{id}/{correct}', 'QuestionsController@attempt');

Route::get('questions/reset_questions','QuestionsController@resetQuestions');
Route::post('questions/{id}', 'QuestionsController@storeAnswer');
Route::get('questions/index', 'QuestionsController@adminIndex');
Route::resource('questions', 'QuestionsController');
Route::resource('flashcards', 'FlashcardsController');
Route::resource('users', 'UsersController');
