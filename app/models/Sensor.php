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

    public function getNameAttribute()
    {
        return empty($this->label) ? $this->uuid : sprintf('%s <span class="opaque">( %s )</span>', $this->label, $this->uuid);
    }
}