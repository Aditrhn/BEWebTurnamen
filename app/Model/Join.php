<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Join extends Model
{
    protected $guarded = [];
    public $timestamps = \true;
    public function isPaid()
    {
        return $this->payment_status == self::PAID;
    }
}
