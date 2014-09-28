@extends('layouts.master')

@section('title', 'Sensores')

@section('content')
<div class="sensoresBox">
    <div class="row">
        <h1>Sensors <small><a href="{{ route('dashboard.sensors.add') }}">Add <i class="fa fa-plus"></i></a></small></h1>

        <table class="large-12 columns" role="grid">
            <thead>
                <tr>
                    <th>Identifier/Label</th>
                    <th>Latitude</th>
                    <th>Longitude</th>
                    <th>Status</th>
                    <th>Controls</th>
                </tr>
            </thead>
            <tfoot>
                <th>
                    <td colspan="5">
                        <?php echo $sensors->links(); ?>
                    </td>
                </th>
            </tfoot>
            <tbody>
                @if ( count($sensors) > 0 )
                @foreach ($sensors as $sensor)
                <tr>
                    <td>{{ $sensor->name }}</td>
                    <td>{{{ $sensor->latitude }}}</td>
                    <td>{{{ $sensor->longitude }}}</td>
                    <td>{{ $sensor->status ? '<span class="label success">Active</span>' : '<span class="label alert">Inactive</span>' }}</td>
                    <td>
                        <a href="#" class="openMapModal" data-latitude="{{{ $sensor->latitude }}}" data-longitude="{{{ $sensor->longitude }}}"><i class="fa fa-globe"></i></a>
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
    </div>
</div>
@stop