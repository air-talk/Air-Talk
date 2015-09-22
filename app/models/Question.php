<?php

use \Esensi\Model\Model;
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Model implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'questions';


	protected $fillable = ['question', 'right_answer', 'wrong_answer1', 'wrong_answer2', 'wrong_answer3', 'categories'];


	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	

	protected $rules = array(
		'question' => 'required',
		'right_answer' => 'required',
		'wrong_answer1' => 'required',
		'wrong_answer2' => 'required',
		'wrong_answer3' => 'required',
		'categories' => 'required'
	);

}
