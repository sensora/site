@extends('layouts.master')

@section('title', 'Sensores')

@section('content')
    <h1>Sensors <small><a href="{{ route('dashboard.sensors.add') }}">Add <i class="fa fa-plus"></i></a></small></h1>

    <table class="large-12 columns" role="grid">
        <thead>
            <tr>
                <th>Identifier/Label</th>
                <th>Latitude</th>
                <th>Longitude</th>
                <th>Altitude</th>
                <th>Status</th>
                <th>Controls</th>
            </tr>
        </thead>
        <tbody>
            @if ( count($sensors) > 0 )
            @foreach ($sensors as $sensor)
            <tr>
                <td>{{ $sensor->name }}</td>
                <td>{{ $sensor->latitude }}</td>
                <td>{{ $sensor->longitude }}</td>
                <td>{{ $sensor->altitude or 'N/A' }}</td>
                <td>{{ $sensor->status ? 'Activo' : 'Inactivo' }}</td>
                <td>
                    <a href="{{ route('dashboard.sensors.edit', $sensor->id) }}"><i class="fa fa-pencil-square-o"></i></a>
                    <a class="confirm" href="{{ route('dashboard.sensors.delete', $sensor->id) }}"><i class="fa fa-times"></i></a>
                </td>
            </tr>
            @endforeach
            @else
            <tr>
                <td colspan="5">
                    You don't have any sensors registered.
                </td>
            </tr>
            @endif
        </tbody>
    </table>

    <div id="modalMap" class="reveal-modal" data-reveal>
        <div id="sensor_map"></div>
        <a class="close-reveal-modal">&#215;</a>
    </div>
@stop