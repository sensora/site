<?php
class DashboardSensorsController extends BaseController
{
    public function index()
    {
        return View::make('dashboard.sensors.index');
    }

    public function getAdd()
    {
        return View::make('dashboard.sensors.add');
    }

    public function postAdd()
    {
        //
    }
}