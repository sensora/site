<?php
class ProfileController extends BaseController
{
    protected $apikey;

    public function __construct(ApiKey $apikey)
    {
        parent::__construct();

        $this->apikey = $apikey;
    }

    public function index()
    {
        return View::make('profile.index');
    }

    public function update()
    {
        //
    }

    public function apiKeyIndex()
    {
        //
    }

    public function generateApiKey()
    {
        if ( $this->currentUser->apikey ) {
            return Redirect::route('profile.index')
                    ->withWarning('Ya tienes una llave para usar la API. Revocala si deseas usar una distinta.');
        }

        $this->apikey->key = str_random(20);
        $this->apikey->user_id = $this->currentUser->id;

        if ( ! $this->apikey->save() ) {
            return Redirect::route('profile.index')
                    ->withErrors('Ocurrio un error al generar tu llave.');
        }

        return Redirect::route('profile.index')
                ->withSuccess('Llave generada exitosamente.');
    }

    public function revokeApiKey()
    {
        if ( ! $this->currentUser->apikey ) {
            return Redirect::route('profile.index');
        }

        if ( ! $this->currentUser->apikey->delete() ) {
            return Redirect::route('profile.index')
                    ->withErrors('Ocurrio un error al revocar tu llave.');
        }

        return Redirect::route('profile.index')
                ->withSuccess('Llave revocada exitosamente.');
    }
}