@extends('layouts.master')

@section('title', 'Registro')

@section('content')
	<h1>Registro</h1>

	{{ Form::open(['route' => 'auth.register']) }}
		<div class="row">
			<div class="large-12 columns">
				<label for="name">Nombre:
					{{ Form::text('name') }}
				</label>
			</div>
		</div>
		<div class="row">
			<div class="large-12 columns">
				<label for="email">Email:
					{{ Form::email('email') }}
				</label>
			</div>
		</div>
		<div class="row">
			<div class="large-6 columns">
				<label for="password">Contraseña
					{{ Form::password('password') }}
				</label>
			</div>
			<div class="large-6 columns">
				<label for="password_confirm">Confirmar Contraseña
					{{ Form::password('password_confirm') }}
				</label>
			</div>
		</div>
		<div class="row">
			<div class="large-1 columns">
				{{ Form::submit('Enviar', ['class' => 'button small']) }}
			</div>
		</div>
	{{ Form::close() }}
@stop