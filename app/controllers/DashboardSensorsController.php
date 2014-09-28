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
                    ->withinpu()
                    ->withErrors( $this->sensor->getErrors() );
        }

        Event::fire('sensor.register', [$this->sensor]);

        return Redirect::route('dashboard.sensors.index')
                ->withSuccess('Sensor agregado.');
    }

    public function getEdit($id)
    {
        //
    }

    public function getDelete($id)
    {
        //
    }
}