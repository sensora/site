<?php
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Watson\Validating\ValidatingTrait;

class User extends Eloquent implements UserInterface, RemindableInterface
{

	use UserTrait, RemindableTrait, ValidatingTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

	protected $fillable = ['name', 'email', 'password'];

	protected $rules = [
		'name'		=> 'required',
		'email'		=> 'required|email|unique:users,email',
		'password'	=> 'required'
	];

	public function sensors()
	{
		return $this->hasMany('Sensor');
	}
}
