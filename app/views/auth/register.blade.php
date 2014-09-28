@extends('layouts.master')

@section('title', 'Register')

@section('content')
	<h1>Register</h1>

	{{ Form::open(['route' => 'auth.register']) }}
		<div class="row">
			<div class="large-12 columns">
				<label for="name">Name:
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
				<label for="password">Password
					{{ Form::password('password') }}
				</label>
			</div>
			<div class="large-6 columns">
				<label for="password_confirm">Password confirmation
					{{ Form::password('password_confirm') }}
				</label>
			</div>
		</div>
		<div class="row">
			<div class="large-1 columns">
				{{ Form::submit('Submit', ['class' => 'button small']) }}
			</div>
		</div>
	{{ Form::close() }}
@stop