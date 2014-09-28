<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Data extends Eloquent
{
    use SoftDeletingTrait;

    protected $table = 'data';

    protected $dates = ['deleted_at'];

    protected $fillable = ['sensor_id', 'temperature', 'moisture', 'pressure', 'noise', 'light', 'created_at'];

    protected $hidden = ['id', 'sensor_id', 'deleted_at', 'updated_at'];

    public function sensor()
    {
        return $this->hasOne('Sensor');
    }
}