<?php
class Sensor extends Eloquent
{
    protected $table = 'sensors';

    protected $fillable = ['label', 'latitude', 'longitude'];

    protected $rules = [
        'latitude'  => 'required',
        'longitude' => 'required',
    ];

    public function user()
    {
        return $this->belongsTo('User');
    }
}