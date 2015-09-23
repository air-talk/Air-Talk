<?php

use \Esensi\Model\Model;
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class QuestionAnswer extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'question_user';


	protected $fillable = ['question_id', 'user_id'];


	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	

	protected $rules = array(
		'question_id' => 'required',
		'user_id' => 'required'
	);

	public function users()
	{
		return $this->belongsToMany('User')->withTimeStamps();
	}

}
