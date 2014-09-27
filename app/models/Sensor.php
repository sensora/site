<?php
class Sensor extends Eloquent
{
    protected $table = 'sensors';

    public user()
    {
        $this->belongsTo('User');
    }
}