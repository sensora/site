@extends('layouts.master')

@section('title', 'Sensores')

@section('content')
    <h1>Sensores <a class="small-text-left" href="{{ route('dashboard.sensors.add') }}">Agregar <i class="fa fa-plus"></i></a></h1>

    <table class="large-12 columns" role="grid">
        <thead>
            <tr>
                <th>Identificador</th>
                <th>Latitude</th>
                <th>longitud</th>
                <th>Altitud</th>
                <th>Controles</th>
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
                <td>
                    <a href=""><i class="fa fa-pencil-square-o"></i></a>
                    <a href=""><i class="fa fa-times"></i></a>
                </td>
            </tr>
            @endforeach
            @else
            <tr>
                <td colspan="5">
                    No tienes sensores registrados.
                </td>
            </tr>
            @endif
        </tbody>
    </table>
@stop