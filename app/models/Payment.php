<?php
use Watson\Validating\ValidatingTrait;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Payment extends Eloquent
{
    use ValidatingTrait, SoftDeletingTrait;

    protected $table = 'payments';

    protected $dates = ['deleted_at'];

    public function user()
    {
        return $this->belongsTo('User');
    }
}