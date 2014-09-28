<?php
use Watson\Validating\ValidatingTrait;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class ApiKey extends Eloquent
{
    use ValidatingTrait, SoftDeletingTrait;

    protected $table = 'api_keys';

    protected $dates = ['deleted_at'];

    public function user()
    {
        return $this->belongsTo('User');
    }
}