@extends('layouts.master')

@section('title', 'New Sensor')

@section('content')
    <div class="sensoresBox">
        <div class="row">
            <div class="large-12 columns">
                <h1>New Sensor</h1>
            </div>
        </div>

        {{ Form::open(['route' => 'dashboard.sensors.add']) }}
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
                {{ Form::submit('Add', ['class' => 'button']) }}
            </div>
        </div>
    </div>
<script>
    var home=false;
</script>
    {{ Form::close() }}
@stop