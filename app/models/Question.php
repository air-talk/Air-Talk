<?php

use \Esensi\Model\Model;
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Question extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'questions';


	protected $fillable = ['question', 'right_answer', 'wrong_answer1', 'wrong_answer2', 'wrong_answer3', 'category'];


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
		'category' => 'required'
	);

	public function users()
	{
		return $this->belongsToMany('User')->withTimeStamps();
	}

}
