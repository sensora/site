@extends('layouts.master')

@section('title', 'Edit Sensor')

@section('content')
    <h1>Edit Sensor</h1>

    {{ Form::model($sensor, ['route' => ['dashboard.sensors.edit', $sensor->id]]) }}
        <div class="row">
            <div class="large-12 columns">
                <label for="latitude">Label
                    {{ Form::text('label') }}
                </label>
            </div>
        </div>
        <div class="row">
            <div class="large-12 columns">
                <div id="sensor_map"></div>
            </div>
            <div class="large-6 columns">
                <label for="latitude">Latitude
                    {{ Form::text('latitude', null, ['id' => 'latitude']) }}
                </label>
            </div>
            <div class="large-5 columns">
                <label for="latitude">Longitude
                    {{ Form::text('longitude', null, ['id' => 'longitude']) }}
                </label>
            </div>
            <div class="large-1 columns">
                <a id="getLocation" href="#getlocation"><i class="fa fa-location-arrow fa-2x"></i></a>
            </div>
        </div>
        <div class="row">
            <div class="large-12 columns">
                {{ Form::submit('Edit', ['class' => 'button']) }}
            </div>
        </div>
    {{ Form::close() }}
@stop