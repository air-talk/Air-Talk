<?php

use \Esensi\Model\Model;
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Flashcard extends Model 
{

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'flashcards';


	protected $fillable = ['front', 'back', 'category'];


	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	

	protected $rules = array(
		'front' => 'required',
		'back' => 'required',
		'category' => 'required'
	);

}
