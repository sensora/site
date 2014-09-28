@extends('layouts.master')

@section('title', 'Payments')

@section('content')
<div class="row paymentList">
    
    @if ( count($payments) > 0 )
        @foreach ($payments as $payment)
        <div class="large-4 columns">
	        <ul class="pricing-table">
			  <li class="title">One credit</li>
			  <li class="description">ID: {{$payment->payment_id}}</li>
			  <li class="bullet-item">10k API calls</li>
			  <li class="cta-button"><a class="button" href="/payments/create">Buy another one</a></li>
			</ul>
		</div>
        @endforeach
    @else
    	<a href="/payments/create" class="button expand">Buy one Sensora API credit</a>
    @endif
    
</div>
@stop