<?php
class AuthController extends BaseController
{
	protected $user;

	public function __construct(User $user)
	{
		$this->user = $user;
	}

	public function getLogin()
	{
		return View::make('auth.login');
	}

	public function postLogin()
	{
		$credentials = [
			'email'	=>	Input::get('email'),
			'password'	=> Input::get('password'),
		];

		if ( ! Auth::attempt( $credentials, true ) ) {
			return Redirect::route('auth.login')
					->withErrors('');
		}

		return Redirect::intended('dashboard');
	}

	public function getRegister()
	{
		return View::make('auth.register');
	}

	public function postRegister()
	{
		$this->user->fill( Input::all() );

		if ( ! $this->user->save() ) {
			return Redirect::route('auth.register')
					->withInput()
					->withErrors( $this->user->getErrors() );
		}

		Auth::login($this->user);

		Event::fire('auth.register', [$this->user]);

		return Redirect::route('dashboard')
				->withSuccess('Registro exitoso.');
	}

	public function getLogout()
	{
		Auth::logout();

		return Redirect::route('home');
	}
}