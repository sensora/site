@extends('layouts.master')

@section('title', 'Cuenta')

@section('content')
    <div class="large-12 coumns">
        <div class="row">
            <div class="large-7 columns">
                <h3>Profile</h3>

                {{ Form::model($currentUser, ['route' => 'profile.update']) }}
                    <div class="row">
                        <div class="large-12 columns">
                            <label for="name">Name
                                {{ Form::text('name') }}
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="large-12 columns">
                            <label for="name">Email
                                {{ Form::email('email') }}
                            </label>
                        </div>
                    </div>
                {{ Form::close() }}
            </div>
            <div class="large-5 columns">
                <h3>Api Key</h3>
                @if ( $currentUser->apikey )
                    <div class="large-12 columns">
                        {{ Form::open(['route' => 'profile.api.revoke']) }}
                            <div class="row">
                                <div class="large-8 columns">
                                    <input class="large-6 columns" type="text" value="{{ $currentUser->apikey->key }}" readonly>
                                </div>
                                <div class="large-4 columns">
                                    <button class="button alert tiny" type="submit"><i class="fa fa-trash"></i> Revoke</button>
                                </div>
                            </div>
                        {{ Form::close() }}
                    </div>
                @else
                <div class="row">
                    <div class="large-12 columns">
                        {{ Form::open(['route' => 'profile.api.generate']) }}
                            <p>You don't have any key yet. {{ Form::submit('Generate', ['class' => 'button tiny round']) }}</p>
                        {{ Form::close() }}
                    </div>
                </div>
                @endif
                <div class="large-12 columns">
                    <a href="/payment" class="button button-primary">Add API Credits</a>
                </div>
            </div>
        </div>
    </div>
@stop