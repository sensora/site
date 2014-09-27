@extends('layouts.master')

@section('title', 'Entrar')

@section('content')
	{{ Form::open(['route' => 'auth.login']) }}
		<div class="row">
			<div class="large-12 columns">
				<label for="email">Email:
					{{ Form::email('email') }}
				</label>
			</div>
		</div>
		<div class="row">
			<div class="large-12 columns">
				<label for="password">Contraseña
					{{ Form::password('password') }}
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