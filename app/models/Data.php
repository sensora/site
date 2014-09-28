<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Data extends Eloquent
{
    use SoftDeletingTrait;

    protected $table = 'data';

    protected $dates = ['deleted_at'];

    public function sensor()
    {
        return $this->hasOne('Sensor');
    }
}