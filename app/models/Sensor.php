<?php
use Watson\Validating\ValidatingTrait;

class Sensor extends Eloquent
{
    use ValidatingTrait;

    protected $table = 'sensors';

    protected $fillable = ['label', 'latitude', 'longitude'];

    protected $hidden = ['user_id', 'id', 'label'];

    protected $rules = [
        'latitude'  => 'required',
        'longitude' => 'required',
    ];

    public function user()
    {
        return $this->belongsTo('User');
    }

    public function data()
    {
        return $this->hasMany('Data');
    }

    public function getNameAttribute()
    {
        return empty($this->label) ? $this->uuid : sprintf('%s <span class="opaque">( %s )</span>', e($this->label), $this->uuid);
    }

    public function scopeActive($query)
    {
        return $query->where('status', '=', true);
    }

    public function near($latitude, $longitude, $area)
    {
        $latitude   = DB::getPdo()->quote($latitude);
        $longitude  = DB::getPdo()->quote($longitude);
        $area       = DB::getPdo()->quote($area);

        return DB::select("SELECT s.id, s.uuid, s.latitude, s.longitude,
                            111.045 * DEGREES(ACOS(COS(RADIANS(p.latpoint))
                                    * COS(RADIANS(s.latitude))
                                    * COS(RADIANS(p.longpoint) - RADIANS(s.longitude))
                                    + SIN(RADIANS(p.latpoint))
                                    * SIN(RADIANS(s.latitude)))) AS distance
                        FROM sensors s
                        JOIN (
                            SELECT  $latitude  AS latpoint,  $longitude AS longpoint,
                                    $area AS radius,      111.045 AS distance_unit
                        ) AS p
                        WHERE s.latitude
                                BETWEEN p.latpoint  - (p.radius / p.distance_unit)
                                    AND p.latpoint  + (p.radius / p.distance_unit)
                        AND s.longitude
                            BETWEEN p.longpoint - (p.radius / (p.distance_unit * COS(RADIANS(p.latpoint))))
                                AND p.longpoint + (p.radius / (p.distance_unit * COS(RADIANS(p.latpoint))))
                        AND s.status = 1
                        ORDER BY distance
                        LIMIT 15");
    }
}