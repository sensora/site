@extends('layouts.master')

@section('title', 'Welcome')

@section('content')
<section class="video01 video"></section>
<div id="mainContent">
	<div id="intro">
		<div class="interior">
			<div class="welcomeBox">
				<span>Open data</span> sensor grid network feeded by sensors scatered around the city.
			</div>
			<img src="{{ asset('assets/img/misc/sensoraSimbolo.png') }}" />
		</div>
	</div>

	
	<div class="explicacion textoQueEs">
		<div class="row">
			<div class="large-12 columns">

				<h2>What's sensora?</h2>
				<p class="large-6 small-12 columns">
					A complete sensor grid network that provides precise open real time data.
					This data can be used for improving your locality.
				</p>
				<p class="large-6 small-12 columns">
					<img src="{{ asset('assets/img/animaciones/step02.gif') }}" />
				</p>
			</div>
		</div>
	</div>
	<div class="explicacion textoParaQue">
		<div class="row">
			<div class="large-12 columns">

				<h2>How it works?</h2>
				<p class="large-6 small-12 columns">
					<img src="{{ asset('assets/img/animaciones/step01.gif') }}" />
				</p>
				<p class="large-6 small-12 columns">
					A sensor collects enviromental data, such as temperature, atmospheric pressure, 
					humity, light and noise intensity, altitude, plus others.<br />
					These sensors send the data to the Open API so other users be able to consult it.
				</p>
			</div>
		</div>
	</div>

	<div class="explicacion github">
		<div class="row">
			<div class="large-12 columns">

				<h2>Open Source Data</h2>
				<p class="large-6 small-12 columns">
					<img src="{{ asset('assets/img/misc/github.png') }}" />
				</p>
				<p class="large-6 small-12 columns">
					Data, platform and all the code is open source.<br />
					Feel free to collaborate and improve it. We can do better things together.<br />
					<a href="https://github.com/sensora" target="_blank">Collaborate on Github</a>
				</p>
			</div>
		</div>
	</div>

	<div class="explicacion textoEjemplos">
		<div class="row">
			<div class="large-12 columns">

				<h2>The possibilities are endless</h2>
				<div class="row">
					<div class="large-6 small-12 columns">
						<h3>Improving the mobility</h3>
						<p>
							How about an app which not only gives you a route for your destination but also dodge the rainy clouds when possible. <br />
							Where geographical apps just give you straight routes and the wheater apps only say your city is under rain, Sensora based apps 
							are a lot more specific because they could be able to tell you the exact location of the storm and its direction.<br />
							Enjoy a sunny bicycle ride.
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
							in create new apps.<br />
							Goverment, Bussinesses, Professional and Amateurs Developers. Everybody is invited, 
							just use your imagination and start enjoying the benefits of all the available data by Sensora.
						</p>
						<p>
							
						</p>
					</div>
					<p class="large-6 small-12 columns">
						<img src="{{ asset('assets/img/animaciones/apps.gif') }}" />
					</p>
				</div>

				<h2 class="lastQuote">The sky is the limit <span>(we have no plans to install Sensora above the sky... yet).</span></h2>

			</div>
		</div>
	</div>

	<div class="explicacion creditos">
		<div class="row">
			<div class="large-12 columns">

				<h2>Credits</h2>
				<p class="large-6 small-12 columns">
					Loop video by <a href="https://vimeo.com/britishpoloday" target="_blank">British Polo Day</a>, and it's listed as CC on British Polo's Vimeo profile.
				</p>
				
			</div>
		</div>
	</div>
</div>
@stop