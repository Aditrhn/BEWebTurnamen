<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = ['name', 'platform', 'icon_url'];
    public $timestamps = \true;
}
