<?php

use \Esensi\Model\Model;
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Audio extends Model 
{

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'audiofiles';


	protected $fillable = ['file_name', 'description', 'category'];


	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	

	protected $rules = array(
		'file_name' => 'required',
		'description' => 'required',
		'category' => 'required'
	);

	public function users()
	{
		return $this->belongsToMany('User')->withTimeStamps();
	}

}