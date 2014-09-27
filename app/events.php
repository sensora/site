<?php
use Rhumsaa\Uuid\Uuid;
use Rhumsaa\Uuid\Exception\UnsatisfiedDependencyException;

Event::listen('auth.register', function($user) {
    $user->password = Hash::make($user->password);
    $user->last_login = new DateTime;

    $user->save();
});

Event::listen('auth.login', function($user) {
    $user->last_login = new DateTime;

    $user->save();
});

Event::listen('sensor.register', function($sensor) {
    try {
        $sensor->uuid = Uuid::uuid4();
    } catch (UnsatisfiedDependencyException $e) {}

    if ( empty($sensor->label) ) {
        $sensor->label = $sensor->user->email . '-' . str_random(10);
    }

    $sensor->save();
});