<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $filable = ['name', 'platform'];
    public $timestamps = \true;
}
