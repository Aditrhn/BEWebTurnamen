<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Join extends Model
{
    // protected $guarded = [];
    // public $timestamps = \true;
    // public const PAID = 'paid';
    // public function isPaid()
    // {
    //     return $this->payment_status == self::PAID;
    // }
    protected $guarded = ['id', 'created_at', 'updated_at'];
    public $timestamps = \true;
    public const JOINCODE = 'JOIN-';
    public const SUCCESS = 1;
    public const EXPIRY = 1;
    public const UNIT = 'days';
}
