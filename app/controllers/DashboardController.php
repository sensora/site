<?php
class DashboardController extends BaseController
{
    public function index()
    {
        return Redirect::route('dashboard.sensors.index');

        return View::make('dashboard.index');
    }
}