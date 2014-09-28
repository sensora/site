@extends('layouts.master')

@section('title', 'Welcome')

@section('content')
<section class="video01 video"></section>
<div id="mainContent">
	<div id="intro">
		<div class="interior">
			<div class="welcomeBox">
				Open data sensor grid network feeded by sensors scatered around the city.
			</div>
			<img src="{{ asset('assets/img/misc/sensoraSimbolo.png') }}" />
		</div>
	</div>

	<div class="textoIntro">
		<div class="row">
			<div class="large-12 columns">

				<h2>Explicando lo que hace.</h2>
				<p class="large-6 small-12 columns">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
				<p class="large-6 small-12 columns">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			</div>
		</div>
	</div>
</div>
@stop