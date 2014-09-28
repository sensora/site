@extends('layouts.master')

@section('title', 'Nuevo sensor')

@section('content')
    <h1>Nuevo sensor</h1>

    {{ Form::open(['route' => 'dashboard.sensors.add']) }}
        <div class="row">
            <div class="large-12 columns">
                <label for="latitude">Nombre
                    {{ Form::text('label') }}
                </label>
            </div>
        </div>
        <div class="row">
            <div class="large-12 columns">
                <div id="sensor_map"></div>
            </div>
            <div class="large-6 columns">
                <label for="latitude">Latitud
                    {{ Form::text('latitude', null, ['id' => 'latitude']) }}
                </label>
            </div>
            <div class="large-5 columns">
                <label for="latitude">Longitud
                    {{ Form::text('longitude', null, ['id' => 'longitude']) }}
                </label>
            </div>
            <div class="large-1 columns">
                <a id="getLocation" href="#getlocation"><i class="fa fa-location-arrow fa-2x"></i></a>
            </div>
        </div>
        <div class="row">
            <div class="large-12 columns">
                {{ Form::submit('Agregar', ['class' => 'button']) }}
            </div>
        </div>
    {{ Form::close() }}
@stop