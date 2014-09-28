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

	
	<div class="explicacion textoQueEs">
		<div class="row">
			<div class="large-12 columns">

				<h2>What's sensora?</h2>
				<p class="large-6 small-12 columns">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
				<p class="large-6 small-12 columns">
					<img src="{{ asset('assets/img/animaciones/step01.gif') }}" />
				</p>
			</div>
		</div>
	</div>
	<div class="explicacion textoParaQue">
		<div class="row">
			<div class="large-12 columns">

				<h2>How it works?</h2>
				<p class="large-6 small-12 columns">
					<img src="{{ asset('assets/img/animaciones/step02.gif') }}" />
				</p>
				<p class="large-6 small-12 columns">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			</div>
		</div>
	</div>

	<div class="explicacion textoEjemplos">
		<div class="row">
			<div class="large-12 columns">

				<h2>The possibilities are endless</h2>
				<div class="row">
					<div class="large-6 small-12 columns">
						<h3>Improving the movility</h3>
						<p>
							How about an app which not only gives you a route to your destiny but also dodge the rainy clouds when possible. 
							When geographical apps just gives you straight routes and wheater apps only say your city is under rain, Sensora based apps 
							are a lot more specific because they could be able to tell you the exact location of the storm and its direction.
						</p>
					</div>
					<p class="large-6 small-12 columns">
						<img src="{{ asset('assets/img/animaciones/ruta.gif') }}" />
					</p>
				</div>

				<div class="row">
					<p class="large-6 small-12 columns">
						<img src="{{ asset('assets/img/animaciones/noise.gif') }}" />
					</p>	
					<div class="large-6 small-12 columns">
						<h3>Noise pollution is a health problem</h3>
						<p>
							Sensora registers also audio levels, this is a valuable data for any goverment interested in 
							its population's health. Once a problematic area is detected, the goverment can take actions and 
							conscientization manuvers for the good of its people.
						</p>
					</div>
				</div>

				<div class="row">
					<div class="large-6 small-12 columns">
						<h3>Multiple and all kind of apps in every level</h3>
						<p>
							Everybody is able to use Sensora's API, this is an oportunity for all the people interested 
							in create new apps.<br />Goverment, Bussinesses, Professional and Amateurs Developers. Everybody is invited 
							just use your imagination and start enjoying the benefits of all the data available by Sensora
						</p>
						<p>
							The sky is the limit (we'are not planning to install Sensora above the sky, yet).
						</p>
					</div>
					<p class="large-6 small-12 columns">
						<img src="{{ asset('assets/img/animaciones/apps.gif') }}" />
					</p>
				</div>

			</div>
		</div>
	</div>

	<div class="explicacion creditos">
		<div class="row">
			<div class="large-12 columns">

				<h2>Credits</h2>
				<p class="large-6 small-12 columns">
					Loop video by <a href="https://vimeo.com/britishpoloday" target="_blank">British Polo Day</a>, which listed it as CC on its Vimeo's profile.
				</p>
				
			</div>
		</div>
	</div>
</div>
@stop