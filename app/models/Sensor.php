<?php
use Watson\Validating\ValidatingTrait;

class Sensor extends Eloquent
{
    use ValidatingTrait;

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

    public function getNameAttribute()
    {
        return empty($this->label) ? $this->uuid : sprintf('%s <span class="opaque">( %s )</span>', e($this->label), $this->uuid);
    }
}