<?php
class DashboardSensorsController extends BaseController
{
    protected $sensor;

    public function __construct(Sensor $sensor)
    {
        parent::__construct();

        $this->sensor = $sensor;
    }

    public function index()
    {
        $sensors = $this->currentUser->sensors;

        return View::make('dashboard.sensors.index', compact('sensors'));
    }

    public function getAdd()
    {
        return View::make('dashboard.sensors.add');
    }

    public function postAdd()
    {
        $this->sensor->fill( Input::all() );
        $this->sensor->user_id = $this->currentUser->id;

        if ( ! $this->sensor->save() ) {
            return Redirect::route('dashboard.sensors.add')
                    ->withInput()
                    ->withErrors( $this->sensor->getErrors() );
        }

        Event::fire('sensor.register', [$this->sensor]);

        return Redirect::route('dashboard.sensors.index')
                ->withSuccess('Sensor added succesfully.');
    }

    public function getEdit($id)
    {
        $this->sensor = $this->sensor->find($id);

        if ( $this->sensor->user->id != $this->currentUser->id ) {
            return Redirect::route('dashboard.sensors.index');
        }

        return View::make('dashboard.sensors.edit', ['sensor' => $this->sensor]);
    }

    public function postEdit($id)
    {
        $this->sensor = $this->sensor->find($id);

        if ( $this->sensor->user->id != $this->currentUser->id ) {
            return Redirect::route('dashboard.sensors.index');
        }

        $this->sensor->fill( Input::all() );

        if ( ! $this->sensor->save() ) {
            return Redirect::route('dashboard.sensors.edit', $this->sensor->id)
                    ->withInput()
                    ->withErrors( $this->sensor->getErrors() );
        }

        return Redirect::route('dashboard.sensors.edit', $this->sensor->id)
                ->withSuccess('Sensor edited succesfully.');
    }

    public function getDelete($id)
    {
        //
    }
}