@extends('layouts.master')

@section('title', 'Login')

@section('content')
	{{ Form::open(['route' => 'auth.login']) }}
		<div class="loginBox">
			<div class="row">
				<div class="large-12 columns">
					<label for="email">Email:
						{{ Form::email('email') }}
					</label>
				</div>
			</div>
			<div class="row">
				<div class="large-12 columns">
					<label for="password">Password
						{{ Form::password('password') }}
					</label>
				</div>
			</div>
			<div class="row">
				<div class="large-1 columns">
					{{ Form::submit('Submit', ['class' => 'button small']) }}
				</div>
			</div>
		</div>
<script>
	var home=false;
</script>
	{{ Form::close() }}
@stop